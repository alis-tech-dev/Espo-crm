extend(['search-manager'], (Dep, SearchManager) => {
	return Dep.extend({
		template: 'autocrm:record/panels/relationship',

		searchView: 'views/record/search',

		getSearchDefaultData: function () {
			return this.getMetadata().get('clientDefs.' + this.scope + '.defaultFilterData');
		},

		setup: function () {
			Dep.prototype.setup.call(this);
			if (this.defs.filtersEnabled) {
				this.setupSearch();
			}
		},

		resetSorting: function () {
			this.getStorage().clear('listSorting', this.collection.name);
		},

		setupSearch: function () {
			const searchManager = new SearchManager(
				this.collection,
				'list',
				this.getStorage(),
				this.getDateTime(),
				this.getSearchDefaultData(),
			);

			this.createView(
				'search',
				this.searchView,
				{
					collection: this.collection,
					el: this.options.el + ' .search-container',
					searchManager: searchManager,
					scope: this.scope,
					isWide: true,
				},
				view => {
					this.listenTo(view, 'reset', () => {
						this.resetSorting();
					});
				},
			);
		},
	});
});
