define('autocrm:views/record/row-actions/remove-cross', ['views/base'], function (Dep) {
	return Dep.extend({
		template: 'autocrm:record/row-actions/remove-cross',

		data: function () {
			return {
				modelId: this.model.id,
			};
		},
	});
});
