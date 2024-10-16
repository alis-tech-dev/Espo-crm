define('autocrm:views/dashlets/records', ['views/dashlets/records'], function (Dep) {
	return Dep.extend({
		getSearchData: function () {
			const searchData = Dep.prototype.getSearchData.call(this);

			searchData.advanced = this.getOption('advancedFilters');

			return searchData;
		},
	});
});
