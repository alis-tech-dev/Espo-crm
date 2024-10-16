define(['action-handler'], Dep => {
	return class extends Dep {
		actionPerformWork() {
			let attributes = {
				productionOrderId: this.view.model.id,
			};

			Espo.Ui.notify(' ... ');

			let viewName =
				this.view
					.getMetadata()
					.get([
						'clientDefs',
						'WorkPerformed',
						'modalViews',
						'edit',
					]) || 'production:views/work-performed/modals/edit';

			let options = {
				parentModel: this.view.model,
				scope: 'WorkPerformed',
				attributes: attributes,
				rootUrl: this.view.getRouter().getCurrentUrl(),
				focusForCreate: true,
			};

			let returnDispatchParams = {
				controller: 'WorkPerformed',
				action: null,
				options: { isReturn: true },
			};

			options = {
				...options,
				returnUrl: this.view.getRouter().getCurrentUrl(),
				returnDispatchParams: returnDispatchParams,
			};

			return this.view.createView(
				'quickCreate',
				viewName,
				options,
				view => {
					this.view.listenTo(view, 'close', () => {
						this.view.model.fetch();

						this.view.model.trigger('update-all');
					});

					view.render();
					view.notify(false);
				},
			);
		}

		init() {
			this.controlVisibility();

			this.view.listenTo(
				this.view.model,
				'change:quantityProduced',
				() => {
					this.controlVisibility();
				},
			);
		}

		controlVisibility() {
			if (
				this.view.model.get('quantityProduced') >=
				this.view.model.get('quantityPlanned')
			) {
				this.view.hideHeaderActionItem('performWork');
			} else {
				this.view.showHeaderActionItem('performWork');
			}
		}
	};
});
