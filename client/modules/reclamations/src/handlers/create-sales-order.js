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
						caseId: this.view.model.get('id'),
						caseName: this.view.model.get('name'),
					},
				},
				view => {
					view.render();

					this.view.listenToOnce(view, 'after:save', _ => {
						this.view.hideHeaderActionItem('createSalesOrder');

						this.view.model.fetch().then(_ => {
							Espo.Ui.success('Reclamation created');

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
				'change:status',
				this.controlButtonVisibility.bind(this),
			);
		}

		controlButtonVisibility() {
			if (this.view.model.get('salesOrderId')) {
				this.view.hideHeaderActionItem('createSalesOrder');
			} else {
				this.view.showHeaderActionItem('createSalesOrder');
			}
		}
	};
});
