define(['controller'], Dep => {
	return Dep.extend({
		actionViewEmail: function (options) {
			options = options || {};

			if (!options.emailBody) {
				throw new Error();
			}

			this.entire(
				'autocrm:views/email/view-in-browser',
				{
					emailBody: options.emailBody,
				},
				view => view.render(),
			);
		},
	});
});
