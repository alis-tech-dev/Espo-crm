define(['views/fields/base'], Dep => {
	return class extends Dep {
		listTemplate = 'main:production-order/fields/take-from-warehouse/list';

		events = {
			'click [data-action="takeFromWarehouse"]': function (e) {
				this.openTakeFromWarehouseModal(e);
			},
		};

		takeFromWarehouse(quantity, stockLocation) {
			this.ajaxPostRequest(
				`ProductionOrder/takeFromWarehouse/${this.model.id}/${quantity}/${stockLocation}`,
			).then(_response => {
				Espo.Ui.success(this.translate(_response.status));
                setTimeout(() => {
                    window.location.reload()
                }, 1500);
			});

		}

		reloadData() {
            this.model.fetch().then(() => {
                this.render();
            });
        }

		openTakeFromWarehouseModal(e) {
            this.createView('modal', 'main:views/production-order/fields/edit', {
                model: this.model

            }, modalView => {
                modalView.render();
                modalView.on('before:save', () => {
                    const quantity = modalView.model.get('name');
                    const stockLocation = modalView.$el.find('select[data-name="stockLocation"]').val();

                    if (quantity && quantity > 0) {
                        this.takeFromWarehouse(quantity, stockLocation);
                        modalView.close();
                    } else {
                        this.notify('Please enter a valid quantity.', 'error');
                    }
                });
            });
        }
	};
});
