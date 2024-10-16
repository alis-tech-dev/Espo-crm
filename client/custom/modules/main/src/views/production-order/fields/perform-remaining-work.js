define(['views/fields/base'], Dep => {
	return class extends Dep {
		listTemplate =
			'main:production-order/fields/perform-remaining-work/list';

		events = {
			'click [data-action="performRemainingWork"]': function () {
				this.performRemainingWork();
			},
		};

		fetch() {
			return {};
		}

		performRemainingWork() {
			this.getCollectionFactory().create('WorkPerformed', collection => {
				collection.where = [
					{
						type: 'equals',
						attribute: 'assignedUserId',
						value: this.getUser().id,
					},
					{
						type: 'equals',
						attribute: 'parentType',
						value: 'ProductionOrder',
					},
					{
						type: 'equals',
						attribute: 'parentId',
						value: this.model.id,
					},
					{
						type: 'isNull',
						attribute: 'dateEnd',
					},
				];

				collection.fetch().then(() => {
					if (collection.at(0)) {
						this.openModal(collection.at(0));
					} else {
						this.openModal(null);
					}
				});
			});
		}

		openModal(model) {
			this.createView(
				'modal',
				'views/modals/edit',
				{
					scope: 'WorkPerformed',
					model,
					id: model?.id,
					attributes: {
						parentId: this.model.id,
						parentType: 'ProductionOrder',
						productionOrderId: this.model.id,
						producedAmount:
							this.model.get('quantityPlanned') -
							this.model.get('quantityProduced'),
					},
				},
				modalView => {
					if (!model) {
						modalView.model.set('dateEnd', null);
					}

					this.listenToOnce(modalView, 'after:save', () => {
						model.fetch();

						modalView.close();
					});

					modalView.render();
				},
			);
		}
	};
});
