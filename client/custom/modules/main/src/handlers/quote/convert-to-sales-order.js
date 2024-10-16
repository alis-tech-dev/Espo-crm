define(['action-handler'], Dep => {
	return class extends Dep {
		actionConvertToQuote() {
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
						name: this.view.model.get('name'),
						accountId: this.view.model.get('accountId'),
						accountName: this.view.model.get('accountName'),
						opportunityId: this.view.model.get('id'),
						opportunityName: this.view.model.get('name'),
					},
				},
				view => {
					view.render();
					this.view.listenToOnce(view, 'after:save', _ => {
						this.view.hideHeaderActionItem('convertToQuote');

						this.view.model.fetch().then(_ => {
							Espo.Ui.success(
								this.view.translate(
									'Sales Order Created',
									'labels',
									'Quote',
								),
							);

							view.close();
						});
					});
				},
			);
		}

		init() {}
	};
});
