define('accounting-cz:views/invoice/list', 'views/record/list', function (Dep) {
	return Dep.extend({
		afterRender: function () {
			Dep.prototype.afterRender.call(this);

			this.colorizeRows();
		},

		showMoreRecords: function (
			options,
			collection,
			$list,
			$showMore,
			callback,
		) {
			Dep.prototype.showMoreRecords.call(
				this,
				options,
				collection,
				$list,
				$showMore,
				function () {
					this.colorizeRows();

					if (callback) {
						callback();
					}
				}.bind(this),
			);
		},

		colorizeRows: function () {
			let rows = this.$el.find('.list-row');

			let collection = this.collection;

			rows.each(function () {
				let id = $(this).data('id');

				let model = collection.get(id);

				if (
					new Date(model.get('dueDate')) <= new Date() &&
					model.get('status') !== 'Paid' &&
					model.get('status') !== 'Partially Paid' &&
					model.get('status') !== 'Draft'
				) {
					$(this).addClass('overdue');
				} else if (model.get('status') === 'Paid') {
					$(this).addClass('due');
				} else if (model.get('status') === 'Partially Paid') {
					$(this).addClass('partially-paid');
				}
			});
		},
	});
});
