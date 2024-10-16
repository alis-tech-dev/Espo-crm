define('accounting-cz:acl/received-tax-document-item', ['acl'], function (Dep) {
	return Dep.extend({
		checkIsOwner: function (model) {
			if (model.has('receivedTaxDocumentId')) {
				return true;
			} else {
				return Dep.prototype.checkIsOwner.call(this, model);
			}
		},

		checkInTeam: function (model) {
			if (model.has('receivedTaxDocumentId')) {
				return true;
			} else {
				return Dep.prototype.checkInTeam.call(this, model);
			}
		},
	});
});
