define(['action-handler'], Dep => {
	return class extends Dep {
		actionConvertToLead() {
			const viewName =
				this.view
					.getMetadata()
					.get(['clientDefs', 'Lead', 'modalViews', 'edit']) ||
				'views/modals/edit';

			const fullName = this.view.model.get('name') || '';
			const nameParts = fullName.split(" ");
			const firstName = nameParts.length > 0 ? nameParts[0] : '';
			const lastName = nameParts.length > 1 ? nameParts.slice(1).join(' ') : '';
			const company = (this.view.model.get('company') || '').toString();
			const capitalizedCompany = company.charAt(0).toUpperCase() + company.slice(1).toLowerCase();


			this.view.createView(
				'dialog',
				viewName,
				{
					scope: 'Lead',
					attributes: {
						firstName: firstName,
						lastName: lastName,
						emailAddress: this.view.model.get('emailAddress'),
						addressCountry: this.view.model.get('country'),
						accountName: capitalizedCompany,
						title: this.view.model.get('position'),
						website: this.view.model.get('url'),
						prospectId: this.view.model.get('id'),
						prospectName: this.view.model.get('name'),
						source: "Prospect search"
					},
				},
				view => {
					view.render();

					this.view.listenToOnce(view, 'after:save', _ => {
						this.view.hideHeaderActionItem('convertToLead');

						this.view.model.fetch().then(_ => {
							Espo.Ui.success(
								this.view.translate(
									'Lead Created',
									'labels',
									'Prospect',
								),
							);

							view.close();
						});
					});
				},
			);
		}

		init() {
			const status = this.view.model.get('status');
			if (status === "Converted") {
				this.view.hideHeaderActionItem('convertToLead');
			}
		}
	};
});
