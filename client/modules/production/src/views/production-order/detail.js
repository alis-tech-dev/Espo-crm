define(['views/record/detail'], Dep => {
	return class extends Dep {
		setupBeforeFinal() {
			super.setupBeforeFinal();

			this.on('after:set-detail-mode', () => {
				const operations = this.getFieldView('operations');
				const billOfMaterials = this.getFieldView('billOfMaterials');

				operations.prepare().then(() => operations.render());
				billOfMaterials.prepare().then(() => billOfMaterials.render());
			});
		}
	};
});
