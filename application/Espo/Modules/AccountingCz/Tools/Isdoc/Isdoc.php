<?php

namespace Espo\Modules\AccountingCz\Tools\Isdoc;

use Espo\Core\Utils\Log;
use Espo\Entities\Attachment;
use Espo\ORM\EntityManager;
use Espo\Modules\Accounting\Entities\Invoice;
use Isdoc\Invoice as IsdocInvoice;

class Isdoc
{
    public const LOG_PREFIX = '[Isdoc] ';

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Log $log,
        private readonly ConverterFactory $converterFactory,
    ) {
    }

    public function convertToIsdoc(Invoice $invoice): IsdocInvoice
    {
        $this->log->debug(self::LOG_PREFIX . "Converting to Isdoc ({$invoice->getId()})");

        $converter = $this->converterFactory->create(ConvertType::ToIsdoc);
        $isdoc = $converter->convert($invoice);

        $this->log->debug(self::LOG_PREFIX . "Finished.");

        return $isdoc;
    }

    public function convertFromIsdoc(IsdocInvoice $isdoc): Invoice
    {
        $this->log->debug(self::LOG_PREFIX . "Converting from Isdoc");

        $converter = $this->converterFactory->create(ConvertType::FromIsdoc);
        $invoice = $converter->convert($isdoc);

        $this->log->debug(self::LOG_PREFIX . "Finished.");

        return $invoice;
    }
}
