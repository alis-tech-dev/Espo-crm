define('autocrm:views/dashlets/fields/kanban/entity-type', ['views/dashlets/fields/records/entity-type'], function (
	Dep,
) {
	return Dep.extend({
		setupOptions: function () {
			Dep.prototype.setupOptions.call(this);

			this.params.options = this.params.options.filter(scope => {
				return this.getMetadata().get(['clientDefs', scope, 'kanbanViewMode'], false);
			});
		},
	});
});
