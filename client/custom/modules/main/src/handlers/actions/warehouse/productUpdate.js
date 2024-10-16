define(['action-handler'], Dep => {
    return class extends Dep {

        init() {
            this.view.listenTo(this.view.model, 'change', (model) => {
                const changedAttributes = model.changedAttributes();
                const attributesLength = Object.entries(changedAttributes).length;
                if (changedAttributes) {
                    for (const [field, value] of Object.entries(changedAttributes)) {
                        if (field !== 'modifiedAt' && attributesLength === 1) {
                            this.productUpdate(field, value);
                        }
                    }
                }
            });
            this.controlVisibility();
        }

        productUpdate(field, value) {
            const id = this.view.model.id;
            this.view.ajaxPostRequest(`WarehouseItem/productUpdate/${id}/${field}/${value}`)
                .then(_response => {
                    if (_response.status === 'Success') {
                        this.triggerUpdate();
                        setTimeout(() => {
                            Espo.Ui.success(`Product Field: "${field}"\n Changed value to: ${value}.`)
                        }, 1500);
                    }
                })
        }

        triggerUpdate() {
            const updateButton = document.querySelector('.inline-save-link');
            if (updateButton) {
                updateButton.click();
            }
        }

        controlVisibility() {
            if (this.view && this.view.hideHeaderActionItem) {
                this.view.hideHeaderActionItem('productUpdate');
            }
        }
    }
});
