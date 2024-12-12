define(['action-handler'], Dep => {
    return class extends Dep {
        init() {
            this.controlVisibility();
            this.view.listenTo(
                this.view.model,
                'change:productionStatus',
                this.checkProductionStatus.bind(this)
            );
            this.view.listenTo(this.view.model, 'change:complexity', this.showNotify.bind(this))
        }
        showNotify() {
            const complexity = this.view.model.get('complexity');

            if (complexity === "Very Hard") {
                this.view.model.set('deadline', null)
                this.view.model.set('internDeadline', null)
                
                Espo.Ui.error(this.view.translate('!!! ATTENTION !!!\nFields "Deadline" and "Internal Deadline"\nmust be set manually!'))
            }
        }

        checkProductionStatus() {
            const productionStatus = this.view.model.get('productionStatus');
            const manufacturingReady = this.view.model.get('manufacturingReady');


            if (productionStatus === 'Done') {
                const currentDate = new Date();
                if (manufacturingReady !== this.getFormattedDate(currentDate)) {
                    this.view.model.set('manufacturingReady', this.getFormattedDate(currentDate));
                }
            } else {
                if (manufacturingReady !== null) {
                    this.view.model.set('manufacturingReady', null);
                }
            }
            this.controlVisibility();
        }

        getFormattedDate(date) {
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

        triggerCancel() {
            const cancelButton = document.querySelector('.inline-cancel-link');
            if (cancelButton) {
                cancelButton.click();
            } else {
                console.warn('Cancel button not found.');
            }
        }

       controlVisibility() {
            this.view.hideHeaderActionItem('manufacturingDate');
        }

    }
});