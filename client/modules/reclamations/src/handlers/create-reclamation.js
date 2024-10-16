define(['action-handler'], Dep => {
	return class extends Dep {
		init() {
			this.onChangeReclamationId();

			this.view.listenTo(
				this.view.model,
				'change:reclamationId',
				this.onChangeReclamationId.bind(this),
			);
		}

		onChangeReclamationId() {
			if (this.view.model.get('reclamationId')) {
				this.view.hideHeaderActionItem('createReclamation');
			} else {
				this.view.showHeaderActionItem('createReclamation');
			}
		}

		actionCreateReclamation() {
			const viewName =
				this.view
					.getMetadata()
					.get(['clientDefs', 'Reclamation', 'modalViews', 'edit']) ||
				'views/modals/edit';

			this.view.createView(
				'dialog',
				viewName,
				{
					scope: 'Reclamation',
					attributes: {
						caseId: this.view.model.get('id'),
						caseName: this.view.model.get('name'),
					},
				},
				view => {
					view.render();

					this.view.listenToOnce(view, 'after:save', _ => {
						this.view.hideHeaderActionItem('createReclamation');

						this.view.model.fetch().then(_ => {
							Espo.Ui.success('Reclamation created');

							view.close();
						});
					});
				},
			);
		}
	};
});
