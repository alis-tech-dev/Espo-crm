define(['autocrm:helpers/quick-view-context-menu'], QuickViewHelper => {
	return class {
		constructor(view) {
			this.view = view;
		}

		process() {
			new QuickViewHelper().register(this.view, '.list-row');
		}
	};
});
