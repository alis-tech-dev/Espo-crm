define(['action-handler'], Dep => {
	return class extends Dep {
		actionCreateSalesOrder() {
			const viewName =
				this.view
					.getMetadata()
					.get(['clientDefs', 'SalesOrder', 'modalViews', 'edit']) ||
				'views/modals/edit';

			this.view.createView(
				'dialog',
				viewName,
				{
					scope: 'SalesOrder',
					attributes: {
						salesOrderReclamationId: this.view.model.get('id'),
						salesOrderReclamationName: this.view.model.get('name'),
					},
				},
				view => {
					view.render();

					this.view.listenToOnce(view, 'after:save', _ => {
						this.view.hideHeaderActionItem('createSalesOrder');

						this.view.model.fetch().then(_ => {
							Espo.Ui.success(
								this.view.translate(
									'Supplier order created',
									'labels',
									'Reclamation',
								),
							);

							view.close();
						});
					});
				},
			);
		}

		init() {
			this.controlButtonVisibility();

			this.view.listenTo(
				this.view.model,
				'change:reclamationSalesOrderId',
				this.controlButtonVisibility.bind(this),
			);
		}

		controlButtonVisibility() {
			if (this.view.model.get('reclamationSalesOrderId')) {
				this.view.hideHeaderActionItem('createSalesOrder');
			} else {
				this.view.showHeaderActionItem('createSalesOrder');
			}
		}
	};
});
