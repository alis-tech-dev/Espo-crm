define(['views/settings/modals/tab-list-field-add'], Dep => {
	return Dep.extend({
		setup: function () {
			Dep.prototype.setup.call(this);

			this.buttonList.push({
				name: 'addCustomLink',
				html: this.translate('Custom Link', 'labels', 'Settings'),
			});
		},

		actionAddCustomLink: function () {
			this.trigger('add', {
				type: 'customLink',
				text: this.translate('Custom Link', 'labels', 'Settings'),
				iconClass: null,
				color: null,
			});
		},
	});
});
