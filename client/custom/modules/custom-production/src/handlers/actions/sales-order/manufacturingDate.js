define(['action-handler'], Dep => {
    return class extends Dep {

        init() {
            this.controlVisibility();
            this.view.listenTo(
                this.view.model,
                'change:productionStatus',
                this.checkProductionStatus.bind(this)
            );
            // this.view.listenTo(this.view.model, 'change:complexity', this.showNotify.bind(this))
        }

        showNotify() {
            const complexity = this.view.model.get('complexity');
            const deadline = this.view.model.get('deadline');
            const internalDeadline = this.view.model.get('internDeadline');

            if (complexity === "Very Hard") {
                this.view.model.set('deadline', null);
                this.view.model.set('internDeadline', null);

                Espo.Ui.error(this.view.translate('!!! ATTENTION !!!\nFields "Deadline" and "Internal Deadline"\nmust be set manually!'));
            } else {
                this.updateDeadlineIfNeeded(deadline, complexity, 'deadline');
                this.updateDeadlineIfNeeded(internalDeadline, complexity, 'internDeadline');
            }
        }

        updateDeadlineIfNeeded(date, complexity, field) {
            const today = new Date();
            const dateIn7Days = this.addDays(today, 7);
            const dateIn14Days = this.addDays(today, 14);
            const dateIn21Days = this.addDays(today, 21);
            const dateIn28Days = this.addDays(today, 28);

            const validDates = [today, dateIn7Days, dateIn14Days, dateIn21Days, dateIn28Days];

            if (date === null || validDates.some(validDate => date === validDate.toISOString().split('T')[0])) {
                if (complexity === 'Easy') {
                    this.setDate('deadline', dateIn14Days)
                    this.setDate('internDeadline', dateIn7Days)
                } else if (complexity === 'Hard') {
                    this.setDate(field, dateIn21Days)
                    this.setDate('internDeadline', dateIn28Days)
                }
            }
        }

        setDate(field, date) {
            const resultDate = date.toISOString().split('T')[0]
            this.view.model.set(field, resultDate);
        }

        addDays(date, days) {
            const result = new Date(date);
            result.setDate(date.getDate() + days);
            return result;
        }

        checkProductionStatus() {
            const productionStatus = this.view.model.get('productionStatus');
            const manufacturingReady = this.view.model.get('manufacturingReady');
            const status = this.view.model.get('status');

            if (productionStatus === 'Done') {
                const productionOrder = this.getOpenProductionOrder();
                const currentDate = new Date();

                if (productionOrder) {
                    Espo.Ui.error(`Production Order ${productionOrder.name} must have status "Completed" or\n"Planned Quantity" must be equal "Total Produced Quantity".`)
                    this.triggerCancel();

                } else if (manufacturingReady !== this.getFormattedDate(currentDate) && manufacturingReady === null) {
                    this.view.model.set('manufacturingReady', this.getFormattedDate(currentDate));
                    this.view.model.set('status', 'Ready To Go');
                }

            } else {
                if (status === 'Ready To Go') {
                    this.view.model.set('status', 'In Production');
                }
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

        getOpenProductionOrder() {
            const orders = this.view.model.get("productionOrdersRecordList");
            for (const order of orders) {
                const planned = order.quantityPlanned
                const produced = order.totalProduced

                const total = produced - planned
                if (order.status !== 'Completed' || total !== 0) {
                    return order
                }
            }
            return null;
        }
    }
});