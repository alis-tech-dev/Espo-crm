<?php

namespace Espo\Modules\ProductBase\Hooks\Product;

use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Error\Body;
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Modules\ProductBase\Entities\TaxClass;
use Espo\ORM\Entity;
use Espo\ORM\EntityManager;

class PriceCalculation
{
    public function __construct(
        private readonly EntityManager $entityManager,
    ) {
    }

    /**
     * @throws BadRequest
     */
    public function beforeSave(Entity $entity, array $options = []): void
    {
        if (!empty($options['skipPriceCalculation'])) {
            return;
        }

        assert($entity instanceof Product);

        $pricingType = $entity->getPricingType();
        $costPrice = $entity->getCostPrice();

        /** @var ?TaxClass $taxClass */
        $taxClass = $this->entityManager->getRDBRepository(Product::ENTITY_TYPE)
            ->getRelation($entity, 'taxClass')
            ->findOne();

        if ($taxClass) {
            $entity->setTaxRate($taxClass->getRate());
        }

        $taxRate = $entity->getTaxRate();

        switch ($pricingType) {
            case Product::PRICING_TYPE_FIXED:
                $salesPriceAmount = $entity->getSalesPrice()?->getAmount();

                if ($salesPriceAmount === null) {
                    throw BadRequest
                        ::createWithBody(
                            "Sales Price is required for Fixed Sales Price pricing type.",
                            Body::create()
                                ->withMessageTranslation('salesPriceRequiredForFixedSalesPrice', 'Product')
                                ->encode()
                        );
                }

                $costPriceAmount = $costPrice?->getAmount();
                $markup = null;
                $margin = null;

                if ($costPriceAmount !== null) {
                    if ($salesPriceAmount === 0.0 && $costPriceAmount === 0.0) {
                        $markup = 0;
                        $margin = 0;
                    } else {
                        if ($costPriceAmount !== 0.0) {
                            $markup = ($salesPriceAmount - $costPriceAmount) / $costPriceAmount * 100;
                        }

                        if ($salesPriceAmount !== 0.0) {
                            $margin = ($salesPriceAmount - $costPriceAmount) / $salesPriceAmount * 100;
                        }
                    }
                }

                $entity->setPriceMarkup($markup);
                $entity->setPriceMargin($margin);

                break;
            case Product::PRICING_TYPE_MARKUP:
                $markup = $entity->getPriceMarkup();

                if ($markup === null) {
                    throw BadRequest
                        ::createWithBody(
                            "Markup is required for Markup over Cost pricing type.",
                            Body::create()
                                ->withMessageTranslation('markupRequiredForMarkupOverCost', 'Product')
                                ->encode()
                        );
                }

                if ($costPrice === null) {
                    throw BadRequest
                        ::createWithBody(
                            "Cost Price is required for Markup over Cost pricing type.",
                            Body::create()
                                ->withMessageTranslation('costPriceRequiredForMarkupOverCost', 'Product')
                                ->encode()
                        );
                }

                $markup /= 100;

                $entity->setSalesPrice($costPrice->multiply(1 + $markup));
                $entity->setPriceMargin($markup / (1 + $markup) * 100);

                break;
            case Product::PRICING_TYPE_MARGIN:
                $margin = $entity->getPriceMargin();

                if ($margin === null) {
                    throw BadRequest
                        ::createWithBody(
                            "Margin is required for Profit Margin pricing type.",
                            Body::create()
                                ->withMessageTranslation('marginRequiredForProfitMargin', 'Product')
                                ->encode()
                        );
                }

                if ($costPrice === null) {
                    throw BadRequest
                        ::createWithBody(
                            "Cost Price is required for Profit Margin pricing type.",
                            Body::create()
                                ->withMessageTranslation('costPriceRequiredForProfitMargin', 'Product')
                                ->encode()
                        );
                }

                $margin /= 100;

                $entity->setSalesPrice($costPrice->divide(1 - $margin));
                $entity->setPriceMarkup($margin / (1 - $margin) * 100);

                break;
            case Product::PRICING_TYPE_SAME_AS_COST:
                $entity->setSalesPrice($costPrice);
                $entity->setPriceMarkup(0);
                $entity->setPriceMargin(0);

                break;
            default:
                $entity->setSalesPrice(null);
                $entity->setPriceMarkup(null);
                $entity->setPriceMargin(null);
        }

        $taxCoeff = 1 + $taxRate / 100;

        $entity->setSalesPriceWithTax($entity->getSalesPrice()?->multiply($taxCoeff));
        $entity->setCostPriceWithTax($entity->getCostPrice()?->multiply($taxCoeff));
    }
}
