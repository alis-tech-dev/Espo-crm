define(['controllers/admin'], Dep => {
	return Dep.extend({
		actionLayouts: function (options) {
			const scope = options.scope || null;
			const type = options.type || null;
			const em = options.em || false;

			this.main('autocrm:views/admin/layouts/index', {
				scope: scope,
				type: type,
				em: em,
			});
		},
	});
});
