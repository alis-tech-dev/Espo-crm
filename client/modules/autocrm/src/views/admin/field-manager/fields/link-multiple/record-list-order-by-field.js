define(['views/fields/enum'], Dep => {
	return Dep.extend({
		setupOptions: function () {
			const link = this.model.get('name');
			const foreignScope = this.getMetadata().get(['entityDefs', this.options.scope, 'links', link, 'entity']);

			const fields = this.getFieldManager().getEntityTypeFieldList(foreignScope, {
				typeList: ['int', 'float'],
			});

			fields.unshift('');

			this.params.options = fields;
			this.params.translation = `${foreignScope}.fields`;
		},
	});
});
