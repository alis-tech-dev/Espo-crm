define(['views/modal', 'model'], (Dep, Model) => {
	return class extends Dep {
		templateContent = '<div class="record no-side-margin">{{{record}}}</div>';

		buttonList = [
			{
				name: 'zipAttachments',
				label: 'Zip Attachments',
				labelTranslation: 'Global.labels.Zip Attachments',
				style: 'primary',
			},
			{
				name: 'cancel',
				label: 'Cancel',
			},
		];

		shortcutKeys = {
			'Control+Enter': 'zipAttachments',
		};

		setup() {
			super.setup();

			this.model = new Model();
			this.model.name = 'ZipAttachments';

			this.model.setDefs({
				fields: {
					attachmentField: {
						type: 'enum',
						options: this.options.attachmentFields || [],
						view: 'autocrm:views/modals/zip-attachments/fields/attachment-field',
					},
				},
			});

			this.createView('record', 'views/record/edit-for-modal', {
				model: this.model,
				selector: '.record',
				detailLayout: [
					{
						rows: [
							[
								{
									name: 'attachmentField',
								},
								false,
							],
						],
					},
				],
			});
		}

		async actionZipAttachments() {
			if (await this.getView('record').processFetch()) {
				if (this.getView('record').validate()) {
					return;
				}

				this.trigger('done', this.model);
				this.close();
			}
		}
	};
});
