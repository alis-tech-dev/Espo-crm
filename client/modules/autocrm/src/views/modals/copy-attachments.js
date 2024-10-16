define(['views/modal', 'model'], (Dep, Model) => {
	return class extends Dep {
		templateContent = '<div class="record no-side-margin">{{{record}}}</div>';

		buttonList = [
			{
				name: 'copyAttachments',
				label: 'Copy Attachments',
				labelTranslation: 'Global.labels.Copy Attachments',
				style: 'primary',
			},
			{
				name: 'cancel',
				label: 'Cancel',
			},
		];

		shortcutKeys = {
			'Control+Enter': 'copyAttachments',
		};

		setup() {
			super.setup();

			this.model = new Model();
			this.model.name = 'CopyAttachments';

			this.model.setDefs({
				fields: {
					createNew: {
						type: 'bool',
						default: false,
					},
					entity: {
						type: 'linkParent',
						entityList: this.options.entityList || [],
						view: 'autocrm:views/modals/copy-attachments/fields/entity',
					},
					attachmentField: {
						type: 'enum',
						options: [],
						view: 'autocrm:views/modals/copy-attachments/fields/attachment-field',
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
									name: 'createNew',
								},
								{
									name: 'entity',
								},
							],
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

			this.listenTo(this.model, 'change:entityType', this.updateAttachmentFieldOptions);

			// Inicializace políček při počátečním načtení
			this.once('after:render', () => {
				const entityType = this.model.get('entityType');
				if (entityType) {
					this.updateAttachmentFieldOptions();
				}
			});
		}

		async actionCopyAttachments() {
			if (await this.getView('record').processFetch()) {
				if (this.getView('record').validate()) {
					return;
				}

				this.trigger('done', this.model);
				this.close();
			}
		}

		updateAttachmentFieldOptions() {
			const entityType = this.model.get('entityType');

			if (!entityType) {
				this.model.set('attachmentField', null);
				return;
			}

			const fields = this.getMetadata().get(['entityDefs', entityType, 'fields']) || {};

			const attachmentFields = Object.keys(fields).filter(
				fieldName => fields[fieldName].type === 'attachmentMultiple' || fields[fieldName].type === 'file',
			);

			this.model.set('attachmentField', null);

			if (this.getView('record')) {
				const fieldView = this.getView('record').getFieldView('attachmentField');

				if (fieldView) {
					fieldView.params.options = attachmentFields;
					fieldView.setupOptions();
					fieldView.reRender();
				}
			}
		}
	};
});
