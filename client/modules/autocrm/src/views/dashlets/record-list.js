define('autocrm:views/dashlets/record-list', ['views/dashlets/records'], function (Dep) {
	return Dep.extend({
		name: 'Kanban',

		listView: 'views/record/list',

		setup: function () {
			Dep.prototype.setup.call(this);

			this.listView =
				this.getMetadata().get(['clientDefs', this.scope, 'recordViews', 'listDashlet']) ||
				this.getMetadata().get(['clientDefs', this.scope, 'recordViews', 'list']) ||
				this.listView;
		},

		getSearchData: function () {
			const searchData = Dep.prototype.getSearchData.call(this);

			searchData.advanced = this.getOption('advancedFilters');

			return searchData;
		},

		createView: function (key, viewName, options, callback, wait) {
			if (key === 'list') {
				options.layoutName = this.getOption('layout');

				delete options.listLayout;
			}

			return Dep.prototype.createView.call(this, key, viewName, options, callback, wait);
		},
	});
});
