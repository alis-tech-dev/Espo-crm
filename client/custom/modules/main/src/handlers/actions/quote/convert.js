define(['action-handler'], function (Dep) {
	return Dep.extend({
		actionConvert: function () {
			this.view.createView(
				'dialog',
				'main:views/quote/modals/convert-dialog',
				{
					id: this.view.model.id,
					title: this.view.model.get('name'),
					model: this.view.model,
					el: this.view.options.el,
				},
				view => {
					view.render();
				},
			);
		},
	});
});
