define('accounting:views/fields/items', [
	'autocrm:views/fields/link-multiple',
], function (Dep) {
	return Dep.extend({
		recordListEnabled: true,

		recordListDynamicHandler:
			'accounting:handlers/invoice/record-list-dynamic-handler',

		populateModel: function (model) {
			Dep.prototype.populateModel.call(this, model);

			const currency = this.model.get('amountCurrency');

			const data = {
				taxRate: this.model.get('taxRate'),
				amountCurrency: currency,
				amountWithTaxCurrency: currency,
			}

			this.editDataBeforeSet(data)

			model.set(data);
		},

		editDataBeforeSet: function (data) {
			// override this method
		},
	});
});
