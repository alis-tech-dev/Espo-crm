define(['accounting:views/invoice-item/fields/name'], Dep => {
    return class extends Dep {
        setup() {
            super.setup();

            this.listenTo(this.model, 'change:discount', this.handleDiscountChange);
            this.listenTo(this.model, 'change:quantity', this.handleQuantityChange);
            this.listenTo(this.model, 'change', this.handleSelectProductVisibility);

            const priceList1Value = this.getPriceList1Value();
            if (priceList1Value) {	
                this.handlePriceList1Change(priceList1Value);
            }
        }

        triggerUpdate() {
            const updateButton = document.querySelector('.inline-save-link');
            if (updateButton) {
                updateButton.click();
            } else {
                console.warn('Update button not found.');
            }
        }
        triggerCancel() {
            const cancelButton = document.querySelector('.inline-cancel-link');
            if (cancelButton) {
                cancelButton.click();
            } else {
                console.warn('cancel Button not found.');
            }
        }

        handleQuantityChange() {
            const quantity = this.model.get('quantity');
            const id = this.model.get('id');
            if (id.length > 15) {
                const modalHtml = this.modalTemplate();

                document.body.insertAdjacentHTML('beforeend', modalHtml);

                document.getElementById('confirmBtn').addEventListener('click', () => {
                    const stock = document.getElementById('updateOption').value;
                    Espo.Ui.warning("Waiting...");

                    this.ajaxPostRequest(`SalesOrder/updateProductionOrder/${id}/${quantity}/${stock}`)
                        .then(_response => {
                            if (_response.status === 'Success') {
                                Espo.Ui.success("Updating production order...");
                                setTimeout(() => {
                                    this.triggerUpdate();
                                }, 500);
                            } else if (_response.status === 'Update') {
                                this.triggerUpdate();
                                Espo.Ui.success(`Quantity changed to ${quantity}. Selected location: ${selectedOption}.`);
                            }
                        })
                        .catch(error => {
                            Espo.Ui.error(error);
                        });

                    document.getElementById('SalesOrderModal').remove();
                });

                document.getElementById('cancelBtn').addEventListener('click', () => {
                    document.getElementById('SalesOrderModal').remove();
                    this.triggerCancel();
                });
            }
        }
        modalTemplate() {
            return `
                <div class="modal" style="display: block;">
                    <div class="modal-dialog" style="width: 100vw; height: 100vh">
                        <div class="modal-content" id="SalesOrderModal">
                            <div class="modal-header">
                                <h5 class="modal-title">${this.translate('Change Quantity')}</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                ${this.translate(
                                    'Are you sure you want to change the "Quantity"?<br>' +
                                    'This will update the "Total quantity" in the related ' +
                                    '"Production order"<br> if it exists, and "Total quantity" is less than the "Quantity".<hr>' +
                                    'Please, choose a warehouse for returning items...'
                                )}
                                <br><br>
                                <label>${this.translate('Select Warehouse:')}</label>
                                <select id="updateOption" class="form-control" style="margin-top: 10px; max-width: 200px;">
                                    <option value="brno">Brno</option>
                                    <option value="pv">Prostějov</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button id="confirmBtn" class="btn btn-primary">${this.translate('Confirm')}</button>
                                <button id="cancelBtn" class="btn btn-secondary" data-dismiss="modal">${this.translate('Cancel')}</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }


        getPriceList1Value() {
            const inputElement = document.querySelector('input[data-name="priceList1Name"]');
            if (inputElement) {
                return inputElement ? inputElement.value : null;
            } else {
                const fieldElement = document.querySelector('div.field[data-name="priceList1"] a');
                return fieldElement ? fieldElement.textContent.trim() : null;
            }

        }

        handlePriceList1Change(newPriceList1Name) {
            if (this.model && newPriceList1Name) {
                this.updatePrice(this.model, newPriceList1Name);
            } else {
                console.error('Model or priceList1Name is not defined');
            }
        }

        selectProduct(model) {
            const setData = this.getProductData(model);
            const initialPriceType = this.getPriceList1Value();
            this.updatePrice(model, initialPriceType);

            this.model.set(setData);
            this.handleSelectProductVisibility();
            this.$element.prop('readonly', true);
            this.trigger('change');
        }

        getProductData(model) {
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
            return setData;
        }

        updatePrice(model, priceList1) {
            const pricingData = this.getPricingData(model, priceList1);
            const discount = this.model.get('discount') || 0;

            const setData = this.calculatePrice(pricingData, discount);
            this.model.set(setData);
        }

        getPricingData(model, priceList1) {
            const pricingTypes = {
                'Aledo price A': ['priceA', 'priceACurrency'],
                'B': ['priceB', 'priceBCurrency'],
                'End User': ['priceEndUser', 'priceEndUserCurrency'],
                'Partners price C': ['priceC', 'priceCCurrency'],
                'Aledo.DE': ['priceJesenoConverted', 'priceJesenoConvertedCurrency']
            };

            if (model.get('pricingType')) {
                const [priceKey, currencyKey] = pricingTypes[priceList1] || [];
                return {
                    unitPrice: model.get(priceKey),
                    unitPriceCurrency: model.get(currencyKey),
                    listPrice: model.get(priceKey),
                    listPriceCurrency: model.get(currencyKey)
                };
            } else {
                return {
                    unitPrice: model.get('unitPrice'),
                    unitPriceCurrency: model.get('unitPriceCurrency'),
                    listPrice: model.get('listPrice'),
                    listPriceCurrency: model.get('listPriceCurrency')
                };
            }
        }

        calculatePrice(pricingData, discount) {
            const setData = {};
            if (pricingData.listPrice !== null) {
                setData.listPrice = this.applyDiscount(pricingData.unitPrice, discount);
            }

            if (pricingData.listPriceCurrency !== null) {
                setData.listPriceCurrency = pricingData.listPriceCurrency;
            }

            if (pricingData.unitPrice !== null) {
                setData.unitPrice = pricingData.unitPrice;
            }

            if (pricingData.unitPriceCurrency !== null) {
                setData.unitPriceCurrency = pricingData.unitPriceCurrency;
            }

            return setData;
        }

        applyDiscount(price, discount) {
            if (discount > 0 && price !== null && price !== undefined) {
                return price - (price * discount / 100);
            }
            return price;
        }

        handleDiscountChange() {
            const priceList1Value = this.getPriceList1Value();
            if (priceList1Value) {
                this.updatePrice(this.model, priceList1Value);
            } else {
                console.error('Price list 1 input element not found for discount change');
            }
        }
    };
});
