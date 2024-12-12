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
                        name: "Perform Work\n" + this.view.model.get("name")
                    },
                },
                modalView => {
                    modalView.render();
                    modalView.on('before:save', (view, options) => {
                        const items = this.view.model.get('billOfMaterialsRecordList');
                        const isValid = this.validateProducedAmount(modalView.model, items);
                        if (!isValid[0]) {
                            Espo.Ui.error(isValid[1]);
                            modalView.$el.find('[data-name="save"]').removeClass('disabled').removeAttr('disabled');
                            modalView.$el.find('[data-name="fullForm"]').removeClass('disabled').removeAttr('disabled');
                            modalView.$el.find('[data-name="cancel"]').removeClass('disabled').removeAttr('disabled');
                            options.cancel = true;
                        }
                    });

                    this.view.listenTo(modalView, 'close', () => {
                        const items = this.view.model.get('billOfMaterialsRecordList');
                        const isValid = this.validateProducedAmount(modalView.model, items);
                        if (isValid[0]) {
                            this.view.model.set('isPerform', true);
                            this.view.model.save()
                                .then(() => {
                                    this.view.model.fetch();
                                    this.view.model.trigger('update-all');
                                    Espo.Ui.success(isValid[1]);
                                });
                        } else {
                            this.view.model.fetch();
                            this.view.model.trigger('update-all');
                        }
                    });
                },
            );
        }

        validateProducedAmount(workPerformedModel, items) {
            const productionOrderModel = this.view.model;
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
    };
});
