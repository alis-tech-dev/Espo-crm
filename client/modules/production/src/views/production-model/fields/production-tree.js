define(['views/record/list-tree', 'collection', 'model'], (
	Dep,
	Collection,
	Model,
) => {
	return class extends Dep {
		createDisabled = true;

		itemViewName =
			'production:views/production-model/fields/production-tree-item';

		setup() {
			this.collection = new Collection();

			for (const item of this.model.get('billOfMaterialsRecordList') ||
				[]) {
				let attributes = {
					...item,
					name: item.productName,
				};

				this.collection.add(new Model(attributes));
			}

			super.setup();
		}
	};
});
