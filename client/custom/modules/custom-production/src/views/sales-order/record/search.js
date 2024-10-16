define(['views/record/search'], Dep => {
	return class extends Dep {
		setup() {
			this.viewModeIconClassMap.productionKanban =
				'fas fa-align-left fa-tools';

			super.setup();
		}
	};
});
