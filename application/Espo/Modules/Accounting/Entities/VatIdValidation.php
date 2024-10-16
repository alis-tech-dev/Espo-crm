<?php

namespace Espo\Modules\Accounting\Entities;

use Espo\Core\Field\DateTime;

class VatIdValidation extends \Espo\Core\Templates\Entities\Base
{
    public const ENTITY_TYPE = 'VatIdValidation';

    public const VAT_ID_FIELD = 'name';

    public function getVatId(): string
    {
        return $this->get(self::VAT_ID_FIELD);
    }

    public function setVatId(string $vatId): self
    {
        $this->set(self::VAT_ID_FIELD, $vatId);

        return $this;
    }

    public function isValid(): bool {
        return $this->get("valid");
    }

    public function setValid(bool $valid): self {
        $this->set("valid", $valid);

        return $this;
    }

    public function getLastValidCheck(): ?DateTime {
        /** @var ?DateTime */
        return $this->getValueObject("lastValidCheck");
    }

    public function setLastValidCheck(?DateTime $lastValidCheck): self {
        $this->setValueObject("lastValidCheck", $lastValidCheck);

        return $this;
    }
}
