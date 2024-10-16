define('autocrm:views/admin/field-manager/fields/link-multiple/record-list-enabled', ['views/fields/bool'], function (
	Dep,
) {
	return Dep.extend({
		recordListFields: [
			'recordListLayout',
			'recordListCreateDisabled',
			'recordListLinkDisabled',
			'recordListRemoveDisabled',
			'recordListKeepRemoved',
			'recordListOrderByField',
		],

		setup: function () {
			Dep.prototype.setup.call(this);

			this.listenTo(this.model, 'change:recordListEnabled', this.manageRecordListFieldsVisibility.bind(this));
		},

		afterRender: function () {
			Dep.prototype.afterRender.call(this);

			this.manageRecordListFieldsVisibility();
		},

		manageRecordListFieldsVisibility: function () {
			const func = this.model.get('recordListEnabled') ? 'showField' : 'hideField';

			this.recordListFields.forEach(field => {
				this.getParentView()[func](field);
			});
		},
	});
});
