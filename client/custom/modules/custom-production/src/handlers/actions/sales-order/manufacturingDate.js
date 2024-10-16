define(['action-handler'], Dep => {
    return class extends Dep {
        init() {
            this.controlVisibility();
            this.view.listenTo(
                this.view.model,
                'change:productionStatus',
                this.checkProductionStatus.bind(this)
            );
        }
        checkProductionStatus() {
            const productionStatus = this.view.model.get('productionStatus');
            const manufacturingReady = this.view.model.get('manufacturingReady');

            if (productionStatus === 'Done') {
                const currentDate = this.getFormattedDate();
                if (manufacturingReady !== currentDate) {
                    this.view.model.set('manufacturingReady', currentDate);
                    this.triggerUpdate();
                    Espo.Ui.success(this.view.translate('Manufacturing ready date updated.'));
                }
            } else {
                if (manufacturingReady !== null) {
                    this.view.model.set('manufacturingReady', null);
                }
            }
            this.controlVisibility();
        }

        getFormattedDate() {
            const date = new Date();
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${year}-${month}-${day}`;
        }

        triggerUpdate() {
            const updateButton = document.querySelector('.inline-save-link');
            if (updateButton) {
                updateButton.click();
            } else {
                console.warn('Update button not found.');
            }
        }

       controlVisibility() {
            this.view.hideHeaderActionItem('manufacturingDate');
        }

    }
});