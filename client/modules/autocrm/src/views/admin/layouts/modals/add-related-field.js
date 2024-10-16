// noinspection JSIgnoredPromiseFromCall

define(['views/modal', 'model'], (Dep, Model) => {
	return Dep.extend({
		templateContent: '<div class="field" data-name="relatedField">{{{field}}}</div>',

		backdrop: true,

		setup: function () {
			this.header = this.translate('Select Related Field', 'labels', 'Workflow');
			this.scope = this.options.scope;

			const model = new Model();

			this.createView(
				'field',
				'autocrm:views/admin/layouts/fields/select-related-attribute',
				{
					el: this.getSelector() + ' .field',
					model: model,
					enabledFields: this.options.enabledFields,
					scope: this.options.scope,
					mode: 'edit',
					name: 'selectedRelatedAttribute',
				},
				function (view) {
					this.listenTo(
						view,
						'change',
						function () {
							const selectedRelatedAttribute = model.get('selectedRelatedAttribute');
							if (selectedRelatedAttribute) {
								this.trigger(
									'add-field',
									selectedRelatedAttribute,
									model.get('selectedRelatedAttributeTranslated'),
								);
							}
						},
						this,
					);
				},
			);
		},
	});
});
