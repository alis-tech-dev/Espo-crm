define(['action-handler'], Dep => {
    return class extends Dep {
        init() {
            this.view.hideHeaderActionItem('performWork');
        }

        actionPerformWorkMain() {
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
                            value: 'ProductionOrder',
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

            this.view.createView(
                'modal',
                'views/modals/edit',
                {
                    scope: 'WorkPerformed',
                    model,
                    id: model?.id,
                    attributes: {
                        productionOrderId: this.view.model.id,
                    },
                },
                modalView => {
                    modalView.render();
                    modalView.on('before:save', (view, options) => {
                        const items = this.model.get('billOfMaterialsRecordList');
                        const isValid = this.validateProducedAmount(modalView.model, items);

                        if (!isValid) {
                            modalView.$el.find('[data-name="save"]').removeClass('disabled').removeAttr('disabled');
                            modalView.$el.find('[data-name="fullForm"]').removeClass('disabled').removeAttr('disabled');
                            modalView.$el.find('[data-name="cancel"]').removeClass('disabled').removeAttr('disabled'); 
                            options.cancel = true;
                        }
                    });

                    this.view.listenTo(modalView, 'close', () => {
                        this.view.model.fetch();
                        this.view.model.trigger('update-all');
                    });
                },
            );
        }

        validateProducedAmount(workPerformedModel, items) {
            const productionOrderModel = this.view.model;
            const quantityPlanned = productionOrderModel.get('quantityPlanned');
            const quantityProduced = productionOrderModel.get('quantityProduced');
            const fromWarehouse = productionOrderModel.get('fromWarehouse');
            const remainingQuantity = quantityPlanned - quantityProduced - fromWarehouse;
            let producedAmount = workPerformedModel.get('producedAmount');

			if (items.length > 0) {
				for (let i = 0; i < items.length; i++) {
					const item = items[i];
					if (item.quantity > item.stockQuantity) {
						const message = `Not enough ${item.name} quantity in the stock for perform work.`;
						this.notify(message, 'error');
						return false;
					}
				}
			}
			return this.validationCheck(producedAmount, remainingQuantity, workPerformedModel);

        }

		validationCheck(producedAmount, remainingQuantity, workPerformedModel) {
			if (producedAmount > remainingQuantity) {
				const errorMessage = `Produced amount cannot exceed "${remainingQuantity}".`;
				this.view.notify(errorMessage, 'error');
				workPerformedModel.set('producedAmount', remainingQuantity);
				return false;
			} else if (producedAmount < 1) {
				const errorMessage = `Produced amount cannot be less than "1".`;
				this.view.notify(errorMessage, 'error');
				workPerformedModel.set('producedAmount', remainingQuantity);
                return false;
			} else {
				return true;
			}
		}
    };
});
