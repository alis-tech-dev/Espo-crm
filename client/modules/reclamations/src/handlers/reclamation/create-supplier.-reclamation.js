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
					},
				},
				view => {
					view.render();

					this.view.listenToOnce(view, 'after:save', _ => {
						this.view.hideHeaderActionItem(
							'createSupplierReclamation',
						);

						this.view.model.fetch().then(_ => {
							Espo.Ui.success('Reclamation created');

							view.close();
						});
					});
				},
			);
		}

		init() {}
	};
});
