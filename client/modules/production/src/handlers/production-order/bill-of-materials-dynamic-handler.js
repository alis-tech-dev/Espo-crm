define(['autocrm:record-list-dynamic-handler'], Dep => {
	return class extends Dep {
		init() {
			this.controlQuantityWithdrawnPlanned();

			this.parentModel.on('change:quantityPlanned', () =>
				this.controlQuantityWithdrawnPlanned(),
			);
		}

		onChangeQuantity() {
			this.controlQuantityWithdrawnPlanned();
		}

		controlQuantityWithdrawnPlanned() {
			let quantityWithdrawnPlanned = this.model.get('quantity');

			if (!this.model.get('independent')) {
				quantityWithdrawnPlanned *=
					this.parentModel.get('quantityPlanned');
			}

			this.model.set(
				'quantityWithdrawnPlanned',
				quantityWithdrawnPlanned,
			);
		}
	};
});
