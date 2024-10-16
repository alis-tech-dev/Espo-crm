define('main:views/supplier-order-item/fields/name', [
    'views/fields/varchar',
    'views/fields/link',
], function(Dep) {
    return Dep.extend({
        detailTemplate: 'accounting:invoice-item/fields/name/detail',
        listTemplate: 'accounting:invoice-item/fields/name/detail',
        editTemplate: 'accounting:invoice-item/fields/name/edit',

        warehouseFieldMapping: {
            name: 'name',
            productId: 'id',
            warehouseName: 'name',
        },

        events: _.extend(
            {
                'click [data-action="selectProduct"]': function() {
                    this.notify('Loading...');
                    const viewName =
                        this.getMetadata().get([
                            'clientDefs',
                            'Warehouse',
                            'modalViews',
                            'select',
                        ]) || 'views/modals/select-records';

                    this.createView(
                        'dialog',
                        viewName,
                        {
                            scope: 'Warehouse',
                            createButton: false,
                            forceSelectAllAttributes: true,
                        },
                        function(view) {
                            view.render();
                            this.notify(false);

                            this.listenToOnce(
                                view,
                                'select',
                                function(model) {
                                    view.close();
                                    this.selectProduct(model);
                                },
                                this,
                            );
                        }.bind(this),
                    );
                },
            },
            Dep.prototype.events,
        ),

        data: function() {
            const data = Dep.prototype.data.call(this);
            const isWarehouse = !!this.model.get('productId');

            data.isWarehouse = isWarehouse;
            data.isNotWarehouse = !isWarehouse && this.model.get('name');
            data.productId = this.model.get('productId');

            return data;
        },

        setup: function() {
            Dep.prototype.setup.call(this);

            this.on('change', this.handleSelectWarehouseVisibility, this);
            this.listenTo(this.model, 'change:deliveredQuantity', this.handleDeliveredQuantity);
        },

        handleSelectWarehouseVisibility: function() {
            if (!this.model.get('productId') && this.model.get('name')) {
                this.$el
                    .find('[data-action="selectWarehouse"]')
                    .addClass('disabled')
                    .attr('disabled', 'disabled');
            } else {
                this.$el
                    .find('[data-action="selectWarehouse"]')
                    .removeClass('disabled')
                    .removeAttr('disabled');
            }
        },

        afterRender: function() {
            Dep.prototype.afterRender.call(this);

            this.handleSelectWarehouseVisibility();

            if (this.isEditMode() || this.isSearchMode()) {
                this.setupAutocomplete();
            }
        },

        setupAutocomplete: function() {
            this.$element.autocomplete(this.getAutocompleteOptions());
            this.$element.attr('autocomplete', 'espo-' + this.name);
            this.$element.off('focus.autocomplete');

            this.$element.on('focus', () => {
                if (this.$element.val()) {
                    return;
                }

                this.$element.autocomplete('onFocus');
            });

            this.once('render', () => this.$element.autocomplete('dispose'));
            this.once('remove', () => this.$element.autocomplete('dispose'));
        },

        getAutocompleteOptions: function() {
            return {
                minChars: 1,
                lookup: null,
                autoSelectFirst: true,
                noCache: true,
                triggerSelectOnValidInput: false,
                beforeRender: $c => {
                    if (this.$element.hasClass('input-sm')) {
                        $c.addClass('small');
                    }
                },
                formatResult: suggestion => {
                    return this.getHelper().escapeString(suggestion.value);
                },
                lookupFilter: (suggestion, _query, queryLowerCase) => {
                    if (
                        suggestion.value
                            .toLowerCase()
                            .indexOf(queryLowerCase) === 0
                    ) {
                        return (
                            suggestion.value.length !== queryLowerCase.length
                        );
                    }

                    return false;
                },
                onSelect: s => {
                    this.getModelFactory().create('Warehouse', model => {
                        model.set(s.attributes);

                        this.selectProduct(model);

                        this.$element.focus();
                    });
                },
                serviceUrl: q => this.getAutocompleteUrl(q),
                transformResult: response =>
                    this.transformAutocompleteResult(response),
            };
        },

        getAutocompleteUrl: function(q) {
            const searchParams = this.getSearchParamsForAutocomplete(q);

            return 'Warehouse?searchParams=' + JSON.stringify(searchParams);
        },

        getSearchParamsForAutocomplete: function(q) {
            return {
                maxSize: this.getConfig().get('recordsPerPage'),
                where: [
                    {
                        type: 'textFilter',
                        value: q,
                    },
                ],
            };
        },

        selectProduct: function(model) {
            const setData = {};
            const allowedAttributes = new Set(
                this.getFieldManager().getEntityTypeAttributeList(
                    this.model.name,
                ),
            );

            Object.entries(this.warehouseFieldMapping).forEach(
                ([invoiceField, warehouseField]) => {
                    const value = model.get(warehouseField);

                    if (value && allowedAttributes.has(invoiceField)) {
                        setData[invoiceField] = value;
                    }
                },
            );

            this.model.set(setData);

            this.handleSelectWarehouseVisibility();
            this.$element.prop('readonly', true);

            this.trigger('change');
        },

        updateDeliveredBefore(model, deliveredQuantity) {
            const deliveredBefore = model.get('deliveredBefore');
            const quantity = model.get('quantity');
            const warehouseId = model.get('productId');
            const stock = model.get('stockLocation');

            if (deliveredBefore < deliveredQuantity && deliveredQuantity <= quantity) {
                const diff = deliveredQuantity - deliveredBefore;

                this.ajaxPostRequest(`WarehouseItem/createItems/${warehouseId}/${diff}/${stock}`,)
                    .then(_response => {
                        Espo.Ui.notify(this.translate(_response.status), 'success', 10000)
                    })
                    .catch(error => {
                        const errorMessage = error.response.data?.message
                        Espo.Ui.error(this.translate('Error occurred: ' + errorMessage));
                    });

                model.set('deliveredBefore', deliveredQuantity);
                model.save();
                const newDeliveredBefore = model.get('deliveredBefore');
                if (newDeliveredBefore === deliveredQuantity) {
                    this.triggerUpdate();
                }

            } else if (deliveredQuantity > quantity || deliveredQuantity < deliveredBefore) {
                model.set('deliveredQuantity', deliveredBefore);
                model.save().then(() => {
                    Espo.Ui.error("'Delivered Quantity' must be less than or equal to 'Quantity' and greater than or equal to 'Delivered Before' quantity.");
                });
            }
        },

        triggerUpdate() {
            const updateButton = document.querySelector('.inline-save-link');
            if (updateButton) {
                updateButton.click();
            } else {
                console.warn('Update button not found.');
            }
        },

        handleDeliveredQuantity() {
            const model = this.model;
            const deliveredQuantity = this.model.get('deliveredQuantity');
            this.updateDeliveredBefore(model, deliveredQuantity);
        }
    });
});
