define('autocrm:views/email-template/modals/create', ['views/modal'], function (Dep) {
	return Dep.extend({
		template: 'autocrm:email-template/modals/create',

		setup: function () {
			this.buttonList.push({
				name: 'cancel',
				label: 'Cancel',
			});

			this.header = this.translate('Create EmailTemplate', 'labels', 'EmailTemplate');
		},

		actionCreate: function (data) {
			this.trigger('create', {
				type: data.type,
			});
		},
	});
});
