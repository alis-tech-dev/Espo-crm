define(['views/fields/base', 'collections/tree', 'model'], (
	Dep,
	Collection,
	Model,
) => {
	return class extends Dep {
		detailTemplate = 'production:production-order/fields/production-tree';
		editTemplate = 'production:production-order/fields/production-tree';

		setup() {
			super.setup();

			const collection = new Collection();

			collection.entityType = 'ProductionModelItem';

			for (const item of this.model.get('billOfMaterialsRecordList') ||
				[]) {
				let attributes = {
					...item,
					name: item.productName, //TODO: refactor after layout change
				};

				const model = new Model(attributes);

				model.entityType = 'ProductionModelItem';

				collection.add(model);
			}

			this.wait(
				this.createView(
					'tree',
					'production:views/production-order/production-tree',
					{ collection, ...this.options },
				),
			);
		}
	};
});
