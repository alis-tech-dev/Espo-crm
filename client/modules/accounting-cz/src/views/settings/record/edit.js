define('accounting-cz:views/settings/record/edit', [
	'views/settings/record/edit',
], function (Dep) {
	return Dep.extend({
		layoutName: 'invoice-system-cz',

		setup: function () {
			Dep.prototype.setup.call(this);
		},
	});
});
