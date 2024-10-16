<?php

namespace Espo\Modules\Autocrm\Classes\Jobs;

use Espo\Core\{
    Job\JobDataLess,
    ORM\EntityManager,
};
use Espo\Core\Utils\Config;
use Espo\Core\Utils\Config\ConfigWriter;

class CNBSync implements JobDataLess
{

    protected const URL = 'https://www.cnb.cz/cs/financni-trhy/devizovy-trh/kurzy-devizoveho-trhu/kurzy-devizoveho-trhu/denni_kurz.txt';
    protected EntityManager $entityManager;
    protected ConfigWriter $configWriter;
    protected array $currentRates;

    public function __construct(
        EntityManager $entityManager,
        ConfigWriter $configWriter,
        Config $config
    ) {
        $this->entityManager = $entityManager;
        $this->configWriter = $configWriter;
        $this->currentRates = $config->get('currencyRates');
    }

    public function run(): void
    {
        $response = file_get_contents(self::URL);
        $parsedResponse = explode("\n", $response);

        $exchangeRates = array_slice(
            $parsedResponse,
            2
        ); // Remove date and header row

        if ($exchangeRates[count($exchangeRates) - 1]
            === ""
        ) { // last row can be empty string
            array_pop($exchangeRates);
        }

        $exchangeRates = array_map(function ($row) {
            $row = str_replace(',', '.', $row); // for correct float conversion

            return explode('|', $row);
        }, $exchangeRates);

        $exchangeMap = [];
        foreach ($exchangeRates as [, , $amount, $code, $rate]) {
            $exchangeMap[$code] = round((float)$rate / $amount, 10);
        }

        /* Write to config */
        foreach ($exchangeMap as $code => $rate) {
            if (array_key_exists($code, $this->currentRates)) {
                $this->currentRates[$code] = $rate;
            }
        }
        $this->configWriter->set('currencyRates', $this->currentRates);
        $this->configWriter->save();


        $currencyRepository = $this->entityManager->getRDBRepository('Currency');

        $currencies = $currencyRepository->select()
            ->where(['id!=' => 'CZK'])
            ->find();

        foreach ($currencies as $currency) {
            $currencyCode = $currency->getId();
            if (array_key_exists($currencyCode, $exchangeMap)) {
                $currency->set('rate', $exchangeMap[$currencyCode]);
                $currencyRepository->save($currency);
            }
        }
    }

}
