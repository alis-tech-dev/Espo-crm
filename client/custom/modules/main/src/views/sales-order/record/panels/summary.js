define(['views/record/panels/bottom'], Dep => {
	return class extends Dep {
		template = 'main:sales-order/record/panels/summary';

		setup() {
			this.url = 'SalesOrder/summary/' + this.model.id;

			this.wait(
				Espo.Ajax.getRequest(this.url).then(orders => {
					this.orders = orders;

					for (const order of orders) {
						this.createView(
							order.id,
							'main:views/sales-order/record/panels/summary/tree-item',
							{
								selector:
									'.tree-row[data-id="' + order.id + '"]',
								order,
								level: 0,
							},
							view => view.render(),
						);
					}
				}),
			);

			super.setup();
		}

		afterRender() {
			$('[data-action="order"]').on('click', e => {
				this.actionOrder($(e.currentTarget).data('id'));
			});

			super.afterRender();
		}

		actionOrder(id) {
			Espo.Ajax.getRequest('Product/' + id).then(data => {
				this.getRouter().navigate('#SupplierOrder/create', {
					trigger: false,
				});
				let quantity = data.minimumStockQuantity;

				if (quantity == null) {
					quantity = 1;
				} else {
					quantity *= 3;
				}

				this.getRouter().dispatch('SupplierOrder', 'create', {
					attributes: {
						name: data.name,
						accountId: data.primarySupplierId,
						accountName: data.primarySupplierName,
						itemsRecordList: [
							{
								productId: data.id,
								productName: data.name,
								name: data.name,
								quantity,
							},
						],
					},
				});
			});
		}

		data() {
			return {
				orderIds: this.orders.map(order => order.id),
			};
		}
	};
});
