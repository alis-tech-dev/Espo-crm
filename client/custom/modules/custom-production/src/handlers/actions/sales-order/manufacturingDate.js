define(['action-handler'], Dep => {
    return class extends Dep {
        init() {
            this.controlVisibility();
            this.view.listenTo(
                this.view.model,
                'change:productionStatus',
                this.checkProductionStatus.bind(this)
            );
            // this.view.listenTo(
            //     this.view.model,
            //     'change:complexity',
            //     this.checkComplexity.bind(this)
            // );
        }
        checkProductionStatus() {
            const productionStatus = this.view.model.get('productionStatus');
            const manufacturingReady = this.view.model.get('manufacturingReady');

            if (productionStatus === 'Done') {
                const currentDate = new Date();
                if (manufacturingReady !== this.getFormattedDate(currentDate)) {
                    this.view.model.set('manufacturingReady', this.getFormattedDate(currentDate));
                    this.triggerUpdate();
                    Espo.Ui.success(this.view.translate('Manufacturing ready date updated.'));
                }
            } else {
                if (manufacturingReady !== null) {
                    this.view.model.set('manufacturingReady', null);
                }
                this.triggerCancel();
            }
            this.controlVisibility();
        }

        getFormattedDate(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${year}-${month}-${day}`;
        }

        // checkComplexity() {
        //     const prevComplexity = this.view.model.previous('complexity');
        //     const complexity = this.view.model.get('complexity');
        //     const deadline = this.view.model.get('deadline');
        //     const internDeadline = this.view.model.get('internDeadline');
        //     const currentDate = new Date();
        //     const data = {
        //         'Easy': 14,
        //         'Hard': 28
        //     }

        //         currentDate.setDate(currentDate.getDate() + data[complexity]);
        //         const formattedResultDate = this.getFormattedDate(currentDate);
        //         this.view.model.set('deadline', formattedResultDate);
        //         this.view.model.set('internDeadline', formattedResultDate);

        //     this.triggerUpdate();
        //     this.controlVisibility();
        // }

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