define(['views/fields/base'], Dep => {
    return class extends Dep {
        setup() {
            super.setup();
            this.listenTo(this.model, 'change:status', this.checkStatus);
        }

        checkStatus() {
            const status = this.model.get('status');
            const items = this.model.get('itemsRecordList');
            const isDelivered = this.model.get('isDelivered');

            if (status === 'Delivered' && Number(isDelivered) === 0) {
                Espo.Ui.confirm(
                    this.translate('Are you sure you want to change the status to Delivered? This will update the quantity of each ordered item in the warehouse.'),
                    {
                        confirmText: this.translate('Confirm'),
                        cancelText: this.translate('Cancel'),
                        cancelCallback: () => {
                            this.triggerCancel();
                        }
                    },
                    () => {
                        this.triggerUpdate();
                        this.model.set('isDelivered', 1);
                        this.model.save().then(() => {
                            items.forEach (item => {
                                const quantity = item.quantity;
                                const productId = item.productId;
                                const id = item.id;
                                const deliveredBefore = item.deliveredBefore;
                                const deliveredQuantity = quantity - deliveredBefore;
                                const stock = item.stockLocation;

                                this.ajaxPostRequest(`WarehouseItem/createItems/${productId}/${deliveredQuantity}/${stock}`,)
                                    .then(_response => {
                                        this.ajaxPostRequest(`WarehouseItem/updateItems/${id}/${quantity}`);

                                    })
                                    .catch(error => {
                                        const errorMessage = error.response.data?.message
                                        Espo.Ui.error(this.translate('Error occurred: ' + errorMessage));
                                    });
                            })
                            this.model.fetch().then(() => {
                                this.render();
                            });
                        })
                    },
                );
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

        afterRender() {
            super.afterRender();
        }
    };
});