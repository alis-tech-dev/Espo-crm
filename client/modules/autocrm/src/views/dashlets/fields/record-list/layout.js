define('autocrm:views/dashlets/fields/record-list/layout', ['views/fields/enum'], function (Dep) {
	return Dep.extend({
		setupOptions: function () {
			const entityType = this.model.get('entityType');
			const additionalLayouts = this.getMetadata().get(['clientDefs', entityType, 'additionalLayouts']) || [];

			const options = ['listSmall', 'list'];
			for (const key in additionalLayouts) {
				if (['list', 'listSmall'].includes(additionalLayouts[key].type)) {
					options.push(key);
				}
			}

			this.params.options = options;
			this.params.translation = 'Admin.layouts';
		},
	});
});
