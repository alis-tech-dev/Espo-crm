define('accounting-cz:views/invoice-item/fields/name', [
	'accounting:views/invoice-item/fields/name',
], function (Dep) {
	return Dep.extend({
		productFieldMapping: {
			name: 'name',
			productId: 'id',
			productName: 'name',
			unitPrice: 'salesPrice',
		},
	});
});
