define('accounting:views/fields/link-fill-attributes', [
	'views/fields/link',
], function (Dep) {
	return Dep.extend({
		getSelectFilters: function () {
			const data = {};

			if (this.model.get('accountId')) {
				data.account = {
					type: 'equals',
					attribute: 'accountId',
					value: this.model.get('accountId'),
					data: {
						type: 'is',
						nameValue: this.model.get('accountName'),
					},
				};
			}

			return data;
		},

		select: function (model) {
			Dep.prototype.select.call(this, model);

			if (!this.model.isNew()) {
				return;
			}

			this.ajaxGetRequest(
				this.foreignScope + '/action/getConvertAttributesFor',
				{
					scope: this.model.name,
					id: model.id,
				},
			).then(attributes => {
				this.model.set(attributes);
			});
		},
	});
});
