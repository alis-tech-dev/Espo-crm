define('autocrm:views/admin/field-manager/fields/link-multiple/record-list-layout', ['views/fields/enum'], function (
	Dep,
) {
	return Dep.extend({
		setupOptions: function () {
			const link = this.model.get('name');
			const foreignScope = this.getMetadata().get(['entityDefs', this.options.scope, 'links', link, 'entity']);
			const additionalLayouts = this.getMetadata().get(['clientDefs', foreignScope, 'additionalLayouts']) || [];

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
