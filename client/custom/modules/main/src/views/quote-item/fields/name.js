define(['accounting:views/invoice-item/fields/name'], Dep => {
    return class extends Dep {
        setup() {
            super.setup();

            this.listenTo(this.model, 'change:discount', this.handleDiscountChange);
            this.listenTo(this.model, 'change', this.handleSelectProductVisibility);

            const priceListValue = this.getPriceListValue();
            if (priceListValue) {
                this.handlePriceListChange(priceListValue);
            }
        }
        handlePriceListChange(newPriceListName) {
            if (this.model && newPriceListName) {
                this.updatePrice(this.model, newPriceListName);
            } else {
                console.error('Model or priceListName is not defined');
            }
        }
        getPriceListValue() {
            const inputElement = document.querySelector('input[data-name="priceListName"]');
            if (inputElement) {
                return inputElement ? inputElement.value : null;
            } else {
                const fieldElement = document.querySelector('div.field[data-name="priceList"] a');
                return fieldElement ? fieldElement.textContent.trim() : null;
            }

        }

        selectProduct(model) {
            const setData = {};
            const allowedAttributes = new Set(
                this.getFieldManager().getEntityTypeAttributeList(this.model.name)
            );

            Object.entries(this.productFieldMapping).forEach(
                ([invoiceField, productField]) => {
                    const value = model.get(productField);
                    if (value && allowedAttributes.has(invoiceField)) {
                        setData[invoiceField] = value;
                    }
                }
            );

            // this.listenTo(this.getParentView().getParentView().getParentView(), 'priceTypeChange', (priceType) => {
            //     this.updatePrice(model, priceType);
            // });

            // const initialPriceType = this.getParentView()
            //     .getParentView()
            //     .getParentView().priceType;
            const initialPriceType = this.getPriceListValue();
            this.updatePrice(model, initialPriceType);

            this.model.set(setData);

            this.handleSelectProductVisibility();
            this.$element.prop('readonly', true);

            this.trigger('change');
        }

        updatePrice(model, priceType) {
            let unitPrice;
            let unitPriceCurrency;
            let listPrice;
            let listPriceCurrency;

            if (model.get('pricingType')) {
                switch (priceType) {
                    case 'Aledo price A':
                        unitPrice = model.get('priceA');
                        unitPriceCurrency = model.get('priceACurrency');
                        listPrice = model.get('priceA');
                        listPriceCurrency = model.get('priceACurrency');
                        break;
                    case 'B':
                        unitPrice = model.get('priceB');
                        unitPriceCurrency = model.get('priceBCurrency');
                        listPrice = model.get('priceB');
                        listPriceCurrency = model.get('priceBCurrency');
                        break;
                    case 'End User':
                        unitPrice = model.get('priceEndUser');
                        unitPriceCurrency = model.get('priceEndUserCurrency');
                        listPrice = model.get('priceEndUser');
                        listPriceCurrency = model.get('priceEndUserCurrency');
                        break;
                    case 'Partners price C':
                        unitPrice = model.get('priceC');
                        unitPriceCurrency = model.get('priceCCurrency');
                        listPrice = model.get('priceC');
                        listPriceCurrency = model.get('priceCCurrency');
                        break;
                    case 'Aledo.DE':
                        unitPrice = model.get('priceJesenoConverted');
                        unitPriceCurrency = model.get('priceJesenoConvertedCurrency');
                        listPrice = model.get('priceJesenoConverted');
                        listPriceCurrency = model.get('priceJesenoConvertedCurrency');
                        break;
                    default:
                        unitPrice = null;
                        unitPriceCurrency = null;
                        listPrice = null;
                        listPriceCurrency = null;
                }
            } else {
                unitPrice = model.get('unitPrice');
                unitPriceCurrency = model.get('unitPriceCurrency');
                listPrice = model.get('listPrice');
                listPriceCurrency = model.get('listPriceCurrency');
            }

            const discount = this.model.get('discount') || 0;

            const setData = {};
            if (listPrice !== null) {
                setData.listPrice = this.applyDiscount(unitPrice, discount);
            }

            if (listPriceCurrency !== null) {
                setData.listPriceCurrency = listPriceCurrency;
            }

            if (unitPrice !== null) {
                setData.unitPrice = unitPrice;
            }

            if (unitPriceCurrency !== null) {
                setData.unitPriceCurrency = unitPriceCurrency;
            }

            this.model.set(setData);
        }

        applyDiscount(price, discount) {
            if (discount > 0 && price !== null && price !== undefined) {
                return price - (price * discount / 100);
            } else {
                return price;
            }
        }

        handleDiscountChange() {
            const model = this.model;
            const priceType = this.getParentView().getParentView().getParentView().priceType;

            this.updatePrice(model, priceType);
        }
    };
});
