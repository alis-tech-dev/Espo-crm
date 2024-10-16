define('accounting-cz:acl/issued-tax-document-item', ['acl'], function (Dep) {
	return Dep.extend({
		checkIsOwner: function (model) {
			if (model.has('issuedTaxDocumentId')) {
				return true;
			} else {
				return Dep.prototype.checkIsOwner.call(this, model);
			}
		},

		checkInTeam: function (model) {
			if (model.has('issuedTaxDocumentId')) {
				return true;
			} else {
				return Dep.prototype.checkInTeam.call(this, model);
			}
		},
	});
});
