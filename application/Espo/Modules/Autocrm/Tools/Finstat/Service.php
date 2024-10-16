<?php

namespace Espo\Modules\Autocrm\Tools\Finstat;

use DOMDocument;
use DOMXPath;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Error;
use Espo\Core\Exceptions\Error\Body as ErrorBody;
use Espo\Core\Exceptions\ErrorSilent;
use stdClass;

readonly class Service
{
	private const URL = 'https://www.finstat.sk/';
	private const STATUS_OK = 'HTTP/1.1 200 OK';
	private const STATUS_NOT_FOUND = 'HTTP/1.1 404 Not Found';

	/**
	 * @throws Error
	 * @throws BadRequest
	 */
	public function getDataBySicCode(string $sicCode): stdClass
	{
		if (!preg_match('/^[0-9]{8}$/', $sicCode)) {
			throw BadRequest::createWithBody(
				'Invalid SIC code',
				ErrorBody::create()
					->withMessageTranslation(
						'invalidSicCode',
						'Account',
						[
							'sicCode' => $sicCode,
						]
					)
					->encode()
			);
		}

		$response = $this->curlRequest(self::URL . $sicCode);
		$responseStatus = $response['status'];
		$html = $response['body'];
		$dom = new DOMDocument();

		if ($responseStatus === self::STATUS_OK) {
			$dom->loadHTML($html);
		} else if ($responseStatus === self::STATUS_NOT_FOUND) {
			throw ErrorSilent::createWithBody(
				'Could not find the company',
				ErrorBody::create()
					->withMessageTranslation(
						'couldNotFindCompanyBySicCode',
						'Account',
						[
							'sicCode' => $sicCode,
						]
					)
					->encode()
			);
		} else {
			throw Error::createWithBody(
				'Error while fetching data from Finstat',
				ErrorBody::create()
					->withMessageTranslation(
						'errorWhileFetchingFinstat',
						'Account',
					)
					->encode()
			);
		}

		return (object)[
			'vatId' => $this->getVatId($dom) ?? '',
			'slovakVatId' => $this->getSlovakVatId($dom) ?? '',
			'name' => $this->getName($dom) ?? '',
			'billingAddressCity' => $this->getAddressCity($dom) ?? '',
			'billingAddressStreet' => $this->getAddressStreet($dom) ?? '',
			'billingAddressState' => $this->getAddressRegion($dom) ?? '',
			'billingAddressPostalCode' => $this->getAddressPostalCode($dom) ?? '',
			'billingAddressCountry' => 'Slovensko',
		];
	}

	private function getVatId(DOMDocument $dom): ?string
	{
		$xpath = new DomXPath($dom);
		$elements = $xpath->query("//li[@class='inline']//strong[text()='DIČ']");

		if ($elements->length === 0) {
			return null;
		}

		$elements = $elements[0]->parentNode->getElementsByTagName('span');

		if ($elements->length === 0) {
			return null;
		}

		return trim($elements[0]->nodeValue);
	}

	private function getSlovakVatId(DOMDocument $dom): ?string
	{
		$xpath = new DomXPath($dom);
		$elements = $xpath->query("//li[@class='inline']//strong[text()='IČ DPH']");

		if ($elements->length === 0) {
			return null;
		}

		$elements = $elements[0]->parentNode->getElementsByTagName('span');

		if ($elements->length === 0) {
			return null;
		}

		$value = explode(',', $elements[0]->nodeValue)[0];

		return trim($value);
	}

	private function getName(DOMDocument $dom): ?string
	{
		$name = $dom->getElementsByTagName('h1')[0]->nodeValue;
		$position = strpos($name, '(Historický názov:');

		if ($position !== false) {
			$name = substr($name, 0, $position);
		}

		return trim($name);
	}

	private function getAddressCity(DOMDocument $dom): ?string
	{
		$xpath = new DomXPath($dom);
		$nodes = $xpath->query('//strong[text()="Sídlo"]');
		$tempAddress = $nodes[0]->parentNode->nodeValue;
		$tempAddress = str_replace('Sídlo ', '', $tempAddress);
		$tempAddress = str_replace($this->getName($dom), '', $tempAddress);

		for ($i = strlen($tempAddress) - 1; $i >= 0; $i--) {
			if (in_array($tempAddress[$i], ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'])) {
				return trim(substr($tempAddress, $i + 1));
			}
		}

		return null;
	}

	private function getAddressStreet(DOMDocument $dom): ?string
	{
		$xpath = new DomXPath($dom);
		$nodes = $xpath->query('//strong[text()="Sídlo"]');
		$offset = strlen($this->getAddressCity($dom)) + strlen($this->getAddressPostalCode($dom));

		$addressStreet = $nodes[0]->parentNode->nodeValue;
		$addressStreet = str_replace('Sídlo ', '', $addressStreet);
		$addressStreet = str_replace($this->getName($dom), '', $addressStreet);
		$addressStreet = substr($addressStreet, 0, strlen($addressStreet) - $offset - 2);

		return trim($addressStreet);
	}

	private function getAddressPostalCode(DOMDocument $dom): ?string
	{
		$xpath = new DomXPath($dom);
		$nodes = $xpath->query('//strong[text()="Sídlo"]');
		$tempAddress = $nodes[0]->parentNode->nodeValue;
		$tempAddress = str_replace('Sídlo ', '', $tempAddress);
		$tempAddress = str_replace($this->getName($dom), '', $tempAddress);

		for ($i = strlen($tempAddress) - 1; $i >= 0; $i--) {
			if (in_array($tempAddress[$i], ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'])) {
				return str_replace(' ', '', trim(substr($tempAddress, $i - 5, 6)));
			}
		}

		return null;
	}

	private function getAddressRegion(DOMDocument $dom): ?string
	{
		$xpath = new DomXPath($dom);
		$nodes = $xpath->query('//div[contains(@class, "detail-menu-related-item")]//a[starts-with(text(), "Databáza firiem v kraji:")]');
		$values = explode(':', $nodes[0]->nodeValue);

		if (count($values) > 1) {
			return trim($values[1]);
		}

		return null;
	}

	private function curlRequest(string $url): array
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, true);
		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			throw new Error('cURL Error: ' . curl_error($ch));
		}

		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($response, 0, $header_size);
		$body = substr($response, $header_size);

		curl_close($ch);

		$status_line = strtok($header, "\r\n");

		return [
			'status' => $status_line,
			'body' => $body
		];
	}
}
