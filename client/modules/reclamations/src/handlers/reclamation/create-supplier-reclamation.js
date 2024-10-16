define(['action-handler'], Dep => {
	return class extends Dep {
		actionCreateSupplierReclamation() {
			const viewName =
				this.view
					.getMetadata()
					.get([
						'clientDefs',
						'SupplierReclamation',
						'modalViews',
						'edit',
					]) || 'views/modals/edit';

			this.view.createView(
				'dialog',
				viewName,
				{
					scope: 'SupplierReclamation',
					attributes: {
						reclamationId: this.view.model.get('id'),
						reclamationName: this.view.model.get('name'),
						productId: this.view.model.get('productId'),
						productName: this.view.model.get('productName'),
					},
				},
				view => {
					view.render();

					this.view.listenToOnce(view, 'after:save', _ => {
						this.view.model.fetch().then(_ => {
							Espo.Ui.success(
								this.view.translate(
									'Supplier reclamation created',
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

		init() {}
	};
});
