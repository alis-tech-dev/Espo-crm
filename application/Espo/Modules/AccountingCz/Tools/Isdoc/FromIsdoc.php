<?php

namespace Espo\Modules\AccountingCz\Tools\Isdoc;

use Espo\Modules\Accounting\Entities\Invoice;
use Isdoc\Invoice as IsdocInvoice;

interface FromIsdoc
{
    public function convert(IsdocInvoice $isdoc): Invoice;
}

