define(['action-handler'], Dep => {
    return class extends Dep {
        actionCreateProductionOrders() {
            const id = this.view.model.get('id');
            const productionStatus = this.view.model.get('productionStatus');

            Espo.Ui.warning('Wait...');
            this.view.ajaxPostRequest(`SalesOrder/createProductionOrders/${id}`)
                .then(response => {
                    switch (response.status) {
                        case 'Success':
                            // this.view.model.trigger('update-all');
                            //
                            // if (productionStatus !== 'NearLaunch')
                            //
                            // this.view.model.save({
                            //     productionStatus: productionStatus,
                            //     status: 'In Production',
                            // }, { patch: true });
                            this.triggerUpdate();
                            // this.view.render();
                            // window.location.reload()
                            break;
                        case 'NoProducts':
                            this.triggerCancel();
                            Espo.Ui.info('Products does not exist');
                            break;
                        default:
                            Espo.Ui.error('No response from the server');
                    }
                });
        }

        init() {
            this.controlVisibility();

            this.view.listenTo(
                this.view.model,
                'change:status',
                this.handleStatusChange.bind(this),
            );
        }

        handleStatusChange() {
            const newStatus = this.view.model.get('status');

            if (newStatus === 'In Production') {
                this.hideButtons();
                this.actionCreateProductionOrders();

            }

            this.controlVisibility();
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
                console.warn('Cancel button not found.');
            }
        }

        hideButtons() {
            const updateButton = document.querySelector('.inline-save-link');
            const cancelButton = document.querySelector('.inline-cancel-link');
            if (updateButton && cancelButton) {
                updateButton.hidden = true;
                cancelButton.hidden = true;
            }
        }

        controlVisibility() {
            this.view.hideHeaderActionItem('createProductionOrders');
        }
    };
});
