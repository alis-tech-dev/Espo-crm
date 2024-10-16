define(['action-handler'], Dep => {
    return class extends Dep {
        actionListScheduledRecurrences() {
            this.view.getRouter().navigate('#RecordRecurrence/list/entityType=' + this.view.scope, {
                trigger: true,
            });
        }

        init() {
            if (!this.view.getConfig().get('showListScheduledRecurrencesButton')) {
                this.view.hideHeaderActionItem('listScheduledRecurrences');

                return;
            }

            const recurringRecordsEntityList = this.view.getHelper().getAppParam('recurringRecordsEntityList') || [];

            if (recurringRecordsEntityList.includes(this.view.scope) && this.view.getAcl().checkScope(this.view.scope, 'create')) {
                this.view.showHeaderActionItem('listScheduledRecurrences');
            } else {
                this.view.hideHeaderActionItem('listScheduledRecurrences');
            }
        }
    };
});
