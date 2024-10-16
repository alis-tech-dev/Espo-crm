<?php

namespace Espo\Modules\Accounting\Classes\TemplateHelpers;

use Espo\Core\Htmlizer\Helper;
use Espo\Core\Htmlizer\Helper\Data;
use Espo\Core\Htmlizer\Helper\Result;

use Defr\QRPlatba\QRPlatba;
use DateTime;

class QrCode implements Helper
{
    public function render(Data $data): Result
    {
        $account = $data->getOption('account');
        $amount = $data->getOption('amount');
        $varSym = $data->getOption('var');
        $constSym = $data->getOption('const');
        $dueDate = $data->getOption('dueDate');

        $size = (string)($data->getOption('size') ?? 100);

        $qr = QRPlatba::create($account, $amount, $varSym);

        if ($constSym) {
            $qr->setConstantSymbol($constSym);
        }

        if ($dueDate) {
            $qr->setDueDate(DateTime::createFromFormat('d.m.Y', $dueDate));
        }

        $img = $qr->getDataUri();
        $img = preg_replace('#^data:image/[^;]+;base64,#', '', $img);
        $html = "<img src=\"@{$img}\" width=\"{$size}\" height=\"{$size}\">";
        return Result::createSafeString($html);
    }
}
