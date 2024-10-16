<?php

declare(strict_types=1);

namespace Ease;

/**
 * 
 *
 * @author    Vitex <vitex@hippy.cz>
 * @copyright 2009-2021 Vitex@hippy.cz (G)
 * 
 * PHP 7
 */
class Brick extends Sand {

    use RecordKey;

    /**
     * Nastavuje jméno objektu
     * Je li známý, doplní jméno objektu hodnotu klíče např User#vitex
     * nebo ProductInCart#4542.
     *
     * @param string $objectName
     *
     * @return string new name
     */
    public function setObjectName($objectName = null) {
        if (is_null($objectName)) {
            $key = $this->getMyKey($this->data);
            if ($key) {
                $result = parent::setObjectName(get_class($this) . '@' . $key);
            } else {
                $result = parent::setObjectName();
            }
        } else {
            $result = parent::setObjectName($objectName);
        }

        return $result;
    }

}
