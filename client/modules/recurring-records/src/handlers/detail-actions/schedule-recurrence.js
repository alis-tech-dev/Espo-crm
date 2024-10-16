define(['action-handler'], Dep => {
    return class extends Dep {
        checkVisibility() {
            return !!this.view.getMetadata().get(['scopes', this.view.model.name, 'calendar']);
        }

        actionScheduleRecurrence() {
            if (!this.view.model.get('dateStart')) {
                this.view.notify(
                    this.view.translate('missingDateStart', 'messages', 'RecordRecurrence'),
                    'warning'
                );
                return;
            }

            const viewName = this.view.getMetadata().get(['clientDefs', 'RecordRecurrence', 'modalViews', 'edit']) || 'views/modals/edit';
            const attributes = {
                name: this.view.model.get('name'),
                data: {
                    id: this.view.model.id,
                },
                entityType: this.view.model.name,
                scheduling: this.getSchedulingExpression(),
            };

            this.view.notify('Loading...');
            this.view.createView('quickCreate', viewName, {
                scope: 'RecordRecurrence',
                fullFormDisabled: true,
                attributes: attributes,
            }, function (view) {
                view.render();
                view.notify(false);
            });
        }

        getSchedulingExpression() {
            const dateStart = this.view.model.get('dateStart');
            let minutes = 0, hour = 0;

            if (dateStart) {
                const dateMoment = this.view.getDateTime().toMoment(dateStart);

                minutes = dateMoment.minutes() || 0;
                hour = dateMoment.hours() || 0;
            }

            return `${minutes} ${hour} * * *`;
        }
    };
});
