define(['views/fields/base'], Dep => {
    return class extends Dep {
        setup() {
            super.setup();
            this.listenTo(this.model, 'change:complexity', this.showNotify);
        }

        showNotify() {
            const complexity = this.model.get('complexity');
            const deadline = this.model.get('deadline');
            const internalDeadline = this.model.get('internDeadline');

            if (complexity === "Very Hard") {
                this.model.set('deadline', null);
                this.model.set('internDeadline', null);

                Espo.Ui.error(this.translate('!!! ATTENTION !!!\nFields "Deadline" and "Internal Deadline"\nmust be set manually!'));
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
            this.model.set(field, resultDate);
        }

        addDays(date, days) {
            const result = new Date(date);
            result.setDate(date.getDate() + days);
            return result;
        }
    };
});










