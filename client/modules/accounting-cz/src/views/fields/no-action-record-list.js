define('accounting-cz:views/fields/no-action-record-list', [
	'autocrm:views/fields/link-multiple',
], function (Dep) {
	return Dep.extend({
		recordListView: 'accounting-cz:views/fields/link-multiple/record-list',
	});
});
