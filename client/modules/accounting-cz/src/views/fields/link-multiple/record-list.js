define('accounting-cz:views/fields/link-multiple/record-list', [
	'autocrm:views/fields/link-multiple/record-list',
	'views/record/list',
], function (Dep) {
	return Dep.extend({
		rowActionsView: 'views/record/row-actions/empty',
	});
});
