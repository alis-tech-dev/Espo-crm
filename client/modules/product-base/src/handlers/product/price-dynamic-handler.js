define('product-base:handlers/product/price-dynamic-handler', ['dynamic-handler'], function (Dep) {
    return Dep.extend({
        pricingTypesMap: {
            'No Price': [],
            'Fixed Sales Price': ['salesPrice', 'salesPriceWithTax'],
            'Markup over Cost': ['priceMarkup'],
            'Profit Margin': ['priceMargin'],
            'Same as Cost Price': [],
        },

        costPriceRequiredTypes: ['Markup over Cost', 'Profit Margin'],

        init: function () {
            this.roundMultiplier = Math.pow(10, this.recordView.getConfig().get('currencyDecimalPlaces'));

            const defaultControl = () => {
                this.controlPricingType();
                this.controlPrice();
            };

            this.recordView.listenTo(this.recordView.recordHelper, 'panel-show', defaultControl);
            defaultControl();
        },

        round: function (val) {
            return val ? Math.round(val * this.roundMultiplier) / this.roundMultiplier : null;
        },

        onChangePricingType: function () {
            this.controlPricingType();
            this.controlPrice();
        },

        onChangeCostPrice: function () {
            this.calculateTaxPrices();
            this.controlPrice();
        },

        onChangeCostPriceCurrency: function () {
            this.model.set('costPriceWithTaxCurrency', this.model.get('costPriceCurrency'));
            this.controlPrice();
        },

        onChangeCostPriceWithTax: function () {
            this.calculatePricesWithoutTax();
        },

        onChangeSalesPrice: function () {
            this.calculateTaxPrices();
            this.controlPrice();
        },

        onChangeSalesPriceCurrency: function () {
            this.model.set('salesPriceWithTaxCurrency', this.model.get('salesPriceCurrency'));
        },

        onChangeSalesPriceWithTax: function () {
            this.calculatePricesWithoutTax();
        },

        onChangePriceMarkup: function () {
            this.controlPrice();
        },

        onChangePriceMargin: function () {
            this.controlPrice();
        },

        onChangeTaxRate: function () {
            this.calculateTaxPrices();
            this.controlPrice();
        },

        controlPricingType: function () {
            let pricingType = this.model.get('pricingType');

            if (!(pricingType in this.pricingTypesMap)) {
                pricingType = 'Fixed Sales Price';
            }

            const targetFields = this.pricingTypesMap[pricingType];

            if (this.costPriceRequiredTypes.includes(pricingType)) {
                this.recordView.setFieldRequired('costPrice');
            } else {
                this.recordView.setFieldNotRequired('costPrice');
            }

            Object.values(this.pricingTypesMap).flat().forEach(field => {
                if (targetFields.includes(field)) {
                    this.recordView.setFieldNotReadOnly(field);
                    this.recordView.setFieldRequired(field);
                } else {
                    this.recordView.setFieldReadOnly(field);
                    this.recordView.setFieldNotRequired(field);
                }
            });
        },

        calculateTaxPrices: function () {
            const taxRate = this.model.get('taxRate') || 0;
            const costPrice = this.model.get('costPrice');
            const salesPrice = this.model.get('salesPrice');

            let costPriceWithTax = null;
            let salesPriceWithTax = null;

            if (costPrice !== null) {
                costPriceWithTax = costPrice * (1 + taxRate / 100);
            }

            if (salesPrice !== null) {
                salesPriceWithTax = salesPrice * (1 + taxRate / 100);
            }

            this.model.set({
                costPriceWithTax: this.round(costPriceWithTax),
                salesPriceWithTax: this.round(salesPriceWithTax),
            });
        },

        calculatePricesWithoutTax: function () {
            const taxRate = this.model.get('taxRate') || 0;
            const costPriceWithTax = this.model.get('costPriceWithTax');
            const salesPriceWithTax = this.model.get('salesPriceWithTax');

            let costPrice = null;
            let salesPrice = null;

            if (costPriceWithTax !== null) {
                costPrice = costPriceWithTax / (1 + taxRate / 100);
            }

            if (salesPriceWithTax !== null) {
                salesPrice = salesPriceWithTax / (1 + taxRate / 100);
            }

            this.model.set({
                costPrice: this.round(costPrice),
                salesPrice: this.round(salesPrice),
            });
        },

        controlPrice: function () {
            const pricingType = this.model.get('pricingType');
            const costPrice = this.model.get('costPrice');
            const costPriceCurrency = this.model.get('costPriceCurrency');

            switch (pricingType) {
                case 'Fixed Sales Price': {
                    const salesPrice = this.model.get('salesPrice');
                    let markup = null;
                    let margin = null;

                    if (salesPrice !== null && costPrice !== null) {
                        if (salesPrice === 0 && costPrice === 0) {
                            markup = 0;
                            margin = 0;
                        } else {
                            if (costPrice !== 0) {
                                markup = (salesPrice - costPrice) / costPrice * 100;
                            }
                            if (salesPrice !== 0) {
                                margin = (salesPrice - costPrice) / salesPrice * 100;
                            }
                        }
                    }

                    this.model.set({
                        priceMarkup: this.round(markup),
                        priceMargin: this.round(margin),
                    });
                    break;
                }
                case 'Markup over Cost': {
                    let markup = this.model.get('priceMarkup');
                    let salesPrice = null;
                    let margin = null;

                    if (markup !== null && costPrice !== null) {
                        markup /= 100;
                        salesPrice = (1 + markup) * costPrice;
                        margin = markup / (1 + markup) * 100;
                    }

                    this.model.set({
                        salesPrice: this.round(salesPrice),
                        salesPriceCurrency: costPriceCurrency,
                        priceMargin: this.round(margin),
                    });
                    break;
                }
                case 'Profit Margin': {
                    let margin = this.model.get('priceMargin');
                    let salesPrice = null;
                    let markup = null;

                    if (margin !== null && costPrice !== null) {
                        margin /= 100;
                        salesPrice = costPrice / (1 - margin);
                        markup = margin / (1 - margin) * 100;
                    }

                    this.model.set({
                        salesPrice: this.round(salesPrice),
                        salesPriceCurrency: costPriceCurrency,
                        priceMarkup: this.round(markup),
                    });
                    break;
                }
                case 'Same as Cost Price': {
                    this.model.set({
                        salesPrice: costPrice,
                        salesPriceCurrency: costPriceCurrency,
                        priceMarkup: null,
                        priceMargin: null,
                    });
                    break;
                }

                default: {
                    this.model.set({
                        salesPrice: null,
                        salesPriceWithTax: null,
                        priceMarkup: null,
                        priceMargin: null,
                    });
                    break;
                }
            }
        }
    });
});
