extend(Dep => {
	return Dep.extend({
		template: 'autocrm:admin/entity-manager/record/edit-formula',

		setup: function () {
			Dep.prototype.setup.call(this);
			this.createField(
				'readLoaderCustomScript',
				'views/fields/formula',
				{
					targetEntityType: this.options.targetEntityType,
					height: 500,
				},
				'edit',
			);

			this.createField(
				'listLoaderCustomScript',
				'views/fields/formula',
				{
					targetEntityType: this.options.targetEntityType,
					height: 500,
				},
				'edit',
			);
		},
	});
});
