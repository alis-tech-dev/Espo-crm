define('autocrm:views/admin/field-manager/fields/link-multiple/record-list-keep-removed', [
	'views/fields/bool',
], function (Dep) {
	return Dep.extend({
		setup: function () {
			Dep.prototype.setup.call(this);

			this.wait(true);
			this.getModelFactory().create(this.model.scope, model => {
				const linkType = model.getLinkType(this.model.get('name'));

				if (linkType === 'manyToMany') {
					this.getParentView().hideField('recordListKeepRemoved');
				}

				this.wait(false);
			});
		},
	});
});
