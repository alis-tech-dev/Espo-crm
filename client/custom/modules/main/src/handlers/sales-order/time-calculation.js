define(['action-handler'], Dep => {
	return class extends Dep {
		init() {
			this.view.hideHeaderActionItem('timeOn');
			this.view.hideHeaderActionItem('timeOff');

			this.view
				.getCollectionFactory()
				.create('WorkPerformed', collection => {
					collection.where = [
						{
							type: 'equals',
							attribute: 'assignedUserId',
							value: this.view.getUser().id,
						},
						{
							type: 'equals',
							attribute: 'parentType',
							value: 'SalesOrder',
						},
						{
							type: 'equals',
							attribute: 'parentId',
							value: this.view.model.id,
						},
						{
							type: 'isNull',
							attribute: 'dateEnd',
						},
					];

					collection.fetch().then(() => {
						if (collection.models[0]) {
							this.view.showHeaderActionItem('timeOff');
						} else {
							this.view.showHeaderActionItem('timeOn');
						}
					});
				});
		}

		actionTimeOn() {
			Espo.Ajax.postRequest(
				'SalesOrder/timeOn/' + this.view.model.id,
			).then(() => {
				this.view.showHeaderActionItem('timeOff');
				this.view.hideHeaderActionItem('timeOn');
			});
		}

		actionTimeOff() {
			Espo.Ajax.postRequest(
				'SalesOrder/timeOff/' + this.view.model.id,
			).then(() => {
				this.view.showHeaderActionItem('timeOn');
				this.view.hideHeaderActionItem('timeOff');
			});
		}
	};
});
