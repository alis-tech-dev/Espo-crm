define(['views/admin/layouts/rows', 'views/admin/layouts/filters'], (Dep, FiltersLayout) => {
	return Dep.extend({
		dataAttributeList: ['name'],

		editable: false,

		ignoreList: [],

		setup: function () {
			this.allowedTypes = [
				...new Set(Object.values(this.getMetadata().get(['aggregationFunctions'])).flatMap(func => func.types)),
			];

			FiltersLayout.prototype.setup.call(this);
		},

		loadLayout: function (callback) {
			FiltersLayout.prototype.loadLayout.call(this, callback);
		},

		fetch: function () {
			return FiltersLayout.prototype.fetch.call(this);
		},

		checkFieldType: function (type) {
			return this.allowedTypes.includes(type);
		},

		validate: function () {
			return true;
		},

		isFieldEnabled: function (model, name) {
			if (this.ignoreList.indexOf(name) !== -1) {
				return false;
			}

			return (
				!model.getFieldParam(name, 'disabled') &&
				!model.getFieldParam(name, 'layoutAggregationFunctionsDisabled')
			);
		},
	});
});
