define(['views/fields/base'], Dep => {
	return class extends Dep {
		listTemplate = 'main:production-order/fields/perform-work/list';

		events = {
			'click [data-action="performWork"]': function () {
				this.performWork();
			},
		};

		fetch() {
			return {};
		}

		performWork() {
			this.model.fetch();
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
						this.collection.at(0).fetch();
						this.openModal(collection.at(0));
					} else {
						this.openModal(null);
					}
				});
			});
		}

		openModal(model) {
			const attributes = {
				parentId: this.model.id,
				parentType: 'ProductionOrder',
				productionOrderId: this.model.id,
			};

			this.createView(
				'modal',
				'views/modals/edit',
				{
					scope: 'WorkPerformed',
					model,
					id: model?.id,
					attributes,
				},
				modalView => {
					if (!model) {
					    modalView.model.set('dateEnd', null);
					}
					modalView.render();
					modalView.once('after:render', () => {
						const date = document.querySelector('div[data-name="dateEnd"]');
						if (date) {
							date.hidden = true;
						}
					});
					modalView.on('before:save', (view, options) => {
						const items = this.model.get('billOfMaterialsRecordList');
						const isValid = this.validateProducedAmount(modalView.model, items);
						if (!isValid[0]) {
							Espo.Ui.error(isValid[1]);
							modalView.$el.find('[data-name="save"]').removeClass('disabled').removeAttr('disabled');
							modalView.$el.find('[data-name="fullForm"]').removeClass('disabled').removeAttr('disabled');
							modalView.$el.find('[data-name="cancel"]').removeClass('disabled').removeAttr('disabled');
							options.cancel = true;
						}
					});

					this.listenTo(modalView, 'close', () => {
						const items = this.model.get('billOfMaterialsRecordList');
						const isValid = this.validateProducedAmount(modalView.model, items);
						if (isValid[0]) {
							this.model.set('isPerform', true);
							this.model.save()
								.then(() => {
									this.activateButton();
									this.model.fetch();
									this.model.trigger('update-all');
									Espo.Ui.success(isValid[1]);
									const salesOrderView = this.getParentView().getParentView().getParentView();
									const salesOrder = salesOrderView.model;
									salesOrder.fetch()
										.then(() => {
											this.render();
										});
								});
						} else {
							this.model.fetch();
							this.model.trigger('update-all');
						}
					});
				},
			);
		}

        validateProducedAmount(workPerformedModel, items) {
            const productionOrderModel = this.model;
            const quantityPlanned = productionOrderModel.get('quantityPlanned');
            const quantityProduced = productionOrderModel.get('quantityProduced');
			const fromWarehouse = productionOrderModel.get('fromWarehouse');
			const totalQuantity = quantityProduced + fromWarehouse;
            const remainingQuantity = quantityPlanned - quantityProduced - fromWarehouse;
            let producedAmount = workPerformedModel.get('producedAmount');

			if (!producedAmount && producedAmount !== 0) {
				const errorMessage = `Produced amount cannot be empty.`;
				return [false, errorMessage];
			} else if ((items.length > 0)) {
				for (let i = 0; i < items.length; i++) {
					const item = items[i];
					if (item.quantity > item.stockQuantity) {
						const errorMessage = `Not enough "${item.name}" available quantity in the stock for perform work.`;
						return [false, errorMessage];
					}
				}
			} else if (producedAmount < 1) {
				const errorMessage = `Produced amount cannot be less than "1".`;
				workPerformedModel.set('producedAmount', remainingQuantity);
				return [false, errorMessage];
			} else if (remainingQuantity <= 0) {
				const errorMessage = `Production order already completed.\n* Planned quantity: ${quantityPlanned} *\n* Total quantity: ${totalQuantity} *`;
				return [false, errorMessage];
			} else if (producedAmount > remainingQuantity) {
				const errorMessage = `Produced amount cannot exceed "${remainingQuantity}".`;
				workPerformedModel.set('producedAmount', remainingQuantity);
				return [false, errorMessage];
			} else {
				const message = `Perform work successfully created for "${productionOrderModel.get('name')}" with quantity ${producedAmount}.`;
				return [true, message];
			}

        }

		activateButton () {
			const id = this.model.get('id');
			const tr = document.querySelector(`tr[data-id="${id}"]`);
			const button = tr.querySelector(`td[data-name="performWorkButton"] button[data-action="performWork"]`);
			const buttonFinish = tr.querySelector(`td[data-name="performWorkFinishButton"] button[data-action="performWorkFinish"]`);
			button.disabled = true;
			buttonFinish.disabled = false;
		}
	};
});

