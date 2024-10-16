define(['views/base'], Dep => {
	return class extends Dep {
		template = 'main:sales-order/record/panels/summary/tree-item';

		setup() {
			if (!this.options.order || !this.options.order.materials) {
				return;
			}

			const materials = this.options.order.materials;

			for (const productId in materials) {
				const productionOrder = materials[productId].productionOrder;

				if (!productionOrder) {
					continue;
				}

				this.createView(
					productionOrder.id,
					'main:views/sales-order/record/panels/summary/tree-item',
					{
						selector:
							'.tree-row[data-id="' + productionOrder.id + '"]',
						order: productionOrder,
						level: this.options.level + 1,
					},
					view => view.render(),
				);
			}

			super.setup();
		}

		data() {
			return {
				order: this.options.order || {},
				level: this.options.level,
			};
		}
	};
});
