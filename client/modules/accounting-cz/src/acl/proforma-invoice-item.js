define('accounting-cz:acl/proforma-invoice-item', ['acl'], function (Dep) {
	return Dep.extend({
		checkIsOwner: function (model) {
			if (model.has('proformaInvoiceId')) {
				return true;
			} else {
				return Dep.prototype.checkIsOwner.call(this, model);
			}
		},

		checkInTeam: function (model) {
			if (model.has('proformaInvoiceId')) {
				return true;
			} else {
				return Dep.prototype.checkInTeam.call(this, model);
			}
		},
	});
});
