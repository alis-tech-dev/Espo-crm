define(['views/fields/base'], Dep => {
    return class extends Dep {
        setup() {
            super.setup();
            this.listenTo(this.model, 'change:productionStatus', this.checkProductionStatus);
        }

        checkProductionStatus() {
            const productionStatus = this.model.get('productionStatus');
            const manufacturingReady = this.model.get('manufacturingReady');

            if (productionStatus === 'Done') {
                const currentDate = this.getFormattedDate();
                if (manufacturingReady !== currentDate) {
                    this.model.set('manufacturingReady', currentDate);
                }
            } else {
                if (manufacturingReady !== null) {
                    this.model.set('manufacturingReady', null);
                }
            }
        }

        getFormattedDate() {
            const date = new Date();
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${year}-${month}-${day}`;
        }

        afterRender() {
            super.afterRender();
            this.checkProductionStatus();
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
    };
});










