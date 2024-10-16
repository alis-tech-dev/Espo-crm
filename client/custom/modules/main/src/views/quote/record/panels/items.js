define(['views/record/panels/bottom'], Dep => {
	return class extends Dep {
		template = 'main:quote/record/panels/items';

		setup() {
			super.setup();

			this.createView(
				'items',
				'main:views/quote/fields/entries',
				{
					el: this.options.el + ' .items',
					model: this.model,
					mode: this.mode,
				},
				view => {
					view.render();

					view.on('change', () => {
						this.trigger('change');
					});
				},
			);
		}

		getFieldViews() {
			return {
				items: this.getView('items'),
			};
		}
	};
});
