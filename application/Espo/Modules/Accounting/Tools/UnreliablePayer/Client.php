<?php

namespace Espo\Modules\Accounting\Tools\UnreliablePayer;

use SoapClient;
use stdClass;

class Client
{
    private readonly SoapClient $soapClient;

    public function __construct()
    {
        $this->soapClient = new SoapClient('https://adisrws.mfcr.cz/dpr/axis2/services/rozhraniCRPDPH.rozhraniCRPDPHSOAP');
    }

    /** @return array<stdClass> */
    public function getList(): array
    {
        return $this->soapClient->getSeznamNespolehlivyPlatce([])->statusPlatceDPH;
    }

    public function getStatus(string $vatId): stdClass
    {
        return $this->soapClient->getStatusNespolehlivySubjektRozsireny(['dic' => $vatId])->statusPlatceDPH;
    }
}
