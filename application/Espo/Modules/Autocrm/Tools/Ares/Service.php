<?php

namespace Espo\Modules\Autocrm\Tools\Ares;

use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Error;
use Espo\Core\Exceptions\Error\Body as ErrorBody;
use Espo\Core\Exceptions\ErrorSilent;
use Espo\Core\Utils\Json;
use stdClass;

class Service
{
	private const URL_BY_SIC = 'https://ares.gov.cz/ekonomicke-subjekty-v-be/rest/ekonomicke-subjekty/';
	private const URL_BY_NAME = 'https://ares.gov.cz/ekonomicke-subjekty-v-be/rest/ekonomicke-subjekty/vyhledat';

	/**
	 * Get company data by the sic code (IČO) from the ARES API
	 * 
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

		$response = $this->curlRequest(self::URL_BY_SIC . $sicCode);

		try {
			$data = Json::decode($response);
		} catch (\JsonException $e) {
			$data = null;
		}

		if ($data === null || !isset($data->ico)) {
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
		}

		return (object)[
			'vatId' => $data->dic ?? null,
			'name' => $data->obchodniJmeno,
			'billingAddressCity' => $data->sidlo->nazevObce,
			'billingAddressStreet' => $this->getStreet($data->sidlo),
			'billingAddressState' => $data->sidlo->nazevKraje,
			'billingAddressPostalCode' => (string)$data->sidlo->psc,
			'billingAddressCountry' => $data->sidlo->kodStatu,
		];
	}

	/**
	 * Get company data by company name from the ARES API
	 *
	 * @param string $name Company name to search for
	 * @return stdClass The raw API response
	 *
	 * @throws Error
	 * @throws BadRequest
	 *
	 * The returned object has the following structure:
	 * {
	 *     "pocetCelkem": int,
	 *     "ekonomickeSubjekty": [
	 *         {
	 *             "ico": string,
	 *             "obchodniJmeno": string,
	 *             "sidlo": {
	 *                 "kodStatu": string,
	 *                 "nazevStatu": string,
	 *                 "kodKraje": int,
	 *                 "nazevKraje": string,
	 *                 "kodOkresu": int,
	 *                 "kodObce": int,
	 *                 "nazevObce": string,
	 *                 "kodMestskehoObvodu": int,
	 *                 "nazevMestskehoObvodu": string,
	 *                 "kodMestskeCastiObvodu": int,
	 *                 "kodUlice": int,
	 *                 "nazevMestskeCastiObvodu": string,
	 *                 "nazevUlice": string,
	 *                 "cisloDomovni": int,
	 *                 "kodCastiObce": int,
	 *                 "cisloOrientacni": int,
	 *                 "nazevCastiObce": string,
	 *                 "kodAdresnihoMista": int,
	 *                 "psc": int,
	 *                 "textovaAdresa": string,
	 *                 "standardizaceAdresy": bool,
	 *                 "typCisloDomovni": int
	 *             },
	 *             "pravniForma": string,
	 *             "financniUrad": string,
	 *             "datumVzniku": string,
	 *             "datumAktualizace": string,
	 *             "dic": string,
	 *             "icoId": string,
	 *             "adresaDorucovaci": {
	 *                 "radekAdresy1": string,
	 *                 "radekAdresy2": string,
	 *                 "radekAdresy3": string
	 *             },
	 *             "seznamRegistraci": {...},
	 *             "primarniZdroj": string,
	 *             "dalsiUdaje": [...],
	 *             "czNace": string[]
	 *         }
	 *     ]
	 * }
	 */
	public function getDataByName(string $name): stdClass
	{
		if (empty($name)) {
			throw BadRequest::createWithBody(
				'Invalid company name',
				ErrorBody::create()
					->withMessageTranslation(
						'invalidCompanyName',
						'Account',
						[
							'name' => $name,
						]
					)
					->encode()
			);
		}

		$requestData = [
			'obchodniJmeno' => $name,
			'pocet' => 10,
			'start' => 0,
			'razeni' => []
		];

		$response = $this->curlRequest(self::URL_BY_NAME, $requestData, true);

		try {
			$data = Json::decode($response);
		} catch (\JsonException $e) {
			throw new Error('Error decoding JSON response: ' . $e->getMessage());
		}

		if ($data === null || !isset($data->ekonomickeSubjekty) || empty($data->ekonomickeSubjekty)) {
			throw ErrorSilent::createWithBody(
				'Could not find the company',
				ErrorBody::create()
					->withMessageTranslation(
						'couldNotFindCompanyByName',
						'Account',
						[
							'name' => $name,
						]
					)
					->encode()
			);
		}

		return $data;
	}

	private function getStreet(stdClass $address): string
	{
		$nazevUlice = $address->nazevUlice ?? null;
		$cisloDomovni = $address->cisloDomovni ?? null;
		$cisloOrientacni = $address->cisloOrientacni ?? null;
		$sidloText = $address->textovaAdresa ?? null;

		if (
			$sidloText &&
			(
				$nazevUlice === null ||
				$cisloDomovni === null ||
				$cisloOrientacni === null
			)
		) {
			return explode(',', $sidloText)[0];
		}

		$street = $nazevUlice;

		if ($cisloDomovni) {
			$street .= ' ' . $cisloDomovni;
		}

		if ($cisloOrientacni) {
			$street .= '/' . $cisloOrientacni;
		}

		return $street;
	}

	private function curlRequest(string $url, array $postData = null, bool $isJson = false): string
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		if ($postData !== null) {
			curl_setopt($ch, CURLOPT_POST, 1);
			if ($isJson) {
				curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
			} else {
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
			}
		}

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			throw new Error('cURL Error: ' . curl_error($ch));
		}

		curl_close($ch);

		return $response;
	}
}
