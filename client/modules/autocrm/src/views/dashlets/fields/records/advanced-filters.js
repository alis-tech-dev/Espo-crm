define('autocrm:views/dashlets/fields/records/advanced-filters', ['autocrm:views/fields/advanced-filters'], function (
	Dep,
) {
	return Dep.extend({
		setup: function () {
			this.entityType = this.model.get('entityType');

			Dep.prototype.setup.call(this);

			this.listenTo(this.model, 'change:entityType', () => {
				this.entityType = this.model.get('entityType');

				this.loadFilters()
					.then(() => this.reRender())
					.then(() => this.fetchToModel());
			});
		},
	});
});
