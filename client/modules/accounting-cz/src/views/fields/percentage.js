define('accounting-cz:views/fields/percentage', [
	'views/fields/float',
], function (Dep) {
	return Dep.extend({
		listTemplate: 'accounting-cz:fields/percentage/list',

		detailTemplate: 'product-base:fields/percentage/detail',
	});
});
