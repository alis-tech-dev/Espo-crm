define('autocrm:views/dashlets/kanban', ['views/dashlets/records'], function (Dep) {
	return Dep.extend({
		name: 'Kanban',

		setup: function () {
			Dep.prototype.setup.call(this);

			const recordViews = this.getMetadata().get(['clientDefs', this.scope, 'recordViews']) || {};

			this.listView = recordViews.kanbanDashlet ?? recordViews.kanban ?? 'views/record/kanban';

			this.collectionUrl = 'Kanban/' + this.scope;
		},

		getSearchData: function () {
			const searchData = Dep.prototype.getSearchData.call(this);

			searchData.advanced = this.getOption('advancedFilters');

			return searchData;
		},

		actionRefresh: function () {
			const listView = this.getView('list');

			if (listView && listView.hasView('quickCreate') && listView.getView('quickCreate').isRendered()) {
				return;
			}

			Dep.prototype.actionRefresh.call(this);
		},
	});
});
