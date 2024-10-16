<?php

namespace Espo\Modules\ProductBase\Entities;

class TaxClass extends \Espo\Core\Templates\Entities\Base
{
    public function getRate(): float
    {
        return (float)$this->get('rate');
    }
}
