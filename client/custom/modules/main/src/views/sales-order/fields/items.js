define(['accounting:views/fields/items'], function (Dep) {
	return class extends Dep {
		editTemplate = 'main:sales-order/fields/items-inner/edit';

		populateModel(model) {
			super.populateModel(model);

			model.set('entryKey', Math.random().toString(16).slice(2));
		}
	};
});
