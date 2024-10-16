define(['model'], Dep => {
	return Dep.extend({
		aggregationData: null,

		searchManager: null,

		scope: null,

		setAggregationData: function (aggregationData) {
			this.aggregationData = aggregationData;
		},

		setSearchManager: function (searchManager) {
			this.searchManager = searchManager;
		},

		setScope: function (scope) {
			this.scope = scope;
		},

		buildUrl: function () {
			return (
				'Aggregation/' +
				this.scope +
				'?' +
				$.param({
					select: Object.keys(this.aggregationData).join(','),
					where: this.searchManager.getWhere(),
				})
			);
		},

		fetch: function (options) {
			if (Object.keys(this.aggregationData).length === 0) {
				return;
			}

			this.url = this.buildUrl();

			Dep.prototype.fetch.call(this, options);
		},
	});
});
