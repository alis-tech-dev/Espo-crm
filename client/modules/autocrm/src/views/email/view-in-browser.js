define('autocrm:views/email/view-in-browser', ['view'], function (Dep) {
	return Dep.extend({
		templateContent: '{{{html}}}',

		data: function () {
			return {
				html: this.options.emailBody,
			};
		},

		afterRender: function () {
			this.$el.find('a[href*="viewInBrowser"]').remove();
		},
	});
});
