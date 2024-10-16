define(['views/list'], Dep => {
	return class extends Dep {
		searchView = 'custom-production:views/sales-order/record/search';

		setViewModeProductionKanban() {
			this.collection.url = 'Kanban/' + this.scope + '/productionStatus';
			this.collection.maxSize = this.getConfig().get(
				'recordsPerPageKanban',
			);
			this.collection.resetOrderToDefault();
		}
	};
});
