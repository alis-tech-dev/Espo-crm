define(() => {
	/**
	 * @memberOf module:autocrm:helpers/quick-view-context-menu
	 */
	return class {
		register(view, selector) {
			const enabled = view.getPreferences().get('quickViewContextMenu');
			if (!enabled) return;

			view.events[`mouseover ${selector}`] = e => {
				const { currentTarget: el } = e;
				el.classList.add('quick-view-context-menu');
			};

			view.events[`mouseout ${selector}`] = e => {
				const { currentTarget: el } = e;
				el.classList.remove('quick-view-context-menu');
			};

			view.events[`contextmenu ${selector}`] = e => {
				const { currentTarget: el } = e;

				const id = el.getAttribute('data-id');

				if (id) {
					e.preventDefault();
					view.actionQuickView({ id });
				}
			};
		}
	};
});
