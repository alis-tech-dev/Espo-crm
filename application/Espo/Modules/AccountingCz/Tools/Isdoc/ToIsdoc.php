<?php

namespace Espo\Modules\AccountingCz\Tools\Isdoc;

use Espo\Modules\Accounting\Entities\Invoice;
use Isdoc\Invoice as IsdocInvoice;

interface ToIsdoc
{
    public function convert(Invoice $invoice): IsdocInvoice;
}

