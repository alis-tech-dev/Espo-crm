define(['action-handler'], ActionHandler => {
	return class extends ActionHandler {
		init() {
			this.view.listenTo(
				this.view.model,
				'change:remainingToPay',
				this.checkVisibility.bind(this),
			);

			this.checkVisibility();
		}

		actionNewPayment() {
			this.view.createView(
				'dialog',
				'accounting-cz:views/invoice-like/modals/new-payment',
				{
					attributes: {
						parentEntityType: this.view.scope,
						parent: this,
						data: this.view.model.attributes,
					},
				},
				view => view.render(),
			);
		}

		checkVisibility() {
			if (this.view.model.get('remainingToPay') <= 0) {
				this.view.hideHeaderActionItem('newPayment');
			} else {
				this.view.showHeaderActionItem('newPayment');
			}
		}
	};
});
