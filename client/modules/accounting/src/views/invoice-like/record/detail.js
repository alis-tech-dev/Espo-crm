define(['views/record/detail'], function (Dep) {
	return Dep.extend({
		stickButtonsFormBottomSelector: '.panel[data-name="items"]',

		setup: function () {
			Dep.prototype.setup.call(this);

			if (this.checkVisibility()) {
				this.addButton({
					name: 'emailPdf',
					label: 'Email PDF',
					style: 'info',
					html:
						"<span class='fas fa-at email-pdf-icon'></span>" +
						this.translate('Email PDF'),
				});

				this.addButton({
					name: 'printPdf',
					label: 'Print to PDF',
					style: 'primary',
					html:
						"<span class='fas fa-print print-pdf-icon'></span>" +
						this.translate('Print to PDF'),
				});

				this.dropdownItemList = this.dropdownItemList.filter(
					item => item.name !== 'printPdf',
				);
			}
		},

		checkVisibility: function () {
			return this.dropdownItemList.some(i => i.name === 'printPdf');
		},

		actionEmailPdf: function () {
			this.createView(
				'pdfTemplate',
				'views/modals/select-template',
				{
					entityType: this.model.name,
				},
				view => {
					view.render();

					this.listenToOnce(view, 'select', model => {
						this.notify('Loading...');

						this.ajaxGetRequest(
							this.model.name + '/action/getAttributesForEmail',
							{
								id: this.model.id,
								templateId: model.id,
							},
						).then(attributes => {
							const viewName =
								this.getMetadata().get([
									'clientDefs',
									'Email',
									'modalViews',
									'compose',
								]) || 'views/modals/compose-email';

							this.createView(
								'composeEmail',
								viewName,
								{
									attributes: attributes,
									keepAttachmentsOnSelectTemplate: true,
									appendSignature: true,
								},
								view => {
									view.render();
									this.notify(false);
								},
							);
						});
					});
				},
			);
		},
	});
});
