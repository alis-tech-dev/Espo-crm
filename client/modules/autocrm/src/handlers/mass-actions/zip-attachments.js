define([], () => {
	return class {
		constructor(view) {
			this.view = view;
		}

		checkVisibility() {
			const collectionName = this.view.collection.name;
			let hide = !collectionName; // ignore lists with unset collections

			if (!hide) {
				const fields = this.view.getMetadata().get(['entityDefs', collectionName, 'fields']);

				if (fields) {
					const attachmentFields = Object.keys(fields).filter(name => {
						const fieldType = fields[name].type;
						return fieldType === 'file' || fieldType === 'attachmentMultiple';
					});

					hide = attachmentFields.length === 0;
					this.attachmentFields = attachmentFields;
				}
			}

			if (hide) {
				this.view.removeMassAction('zipAttachments');
			}
		}

		actionZipAttachments(data) {
			const ids = data.params.ids;
			const collectionName = this.view.collection.name;
			const fields = this.view.getMetadata().get(['entityDefs', collectionName, 'fields']);

			const attachmentFields = Object.keys(fields).filter(name => {
				const fieldType = fields[name].type;
				return fieldType === 'file' || fieldType === 'attachmentMultiple';
			});

			if (attachmentFields.length === 1) {
				this.processZipAttachments(ids, attachmentFields[0]);
			} else {
				this.showZipAttachmentsModal(ids, collectionName);
			}
		}

		showZipAttachmentsModal(ids, entityType) {
			this.view
				.createView('modal', 'autocrm:views/modals/zip-attachments', {
					entityType: entityType,
				})
				.then(view => {
					view.render();

					this.view.listenToOnce(view, 'done', model => {
						const selectedField = model.get('attachmentField');
						this.processZipAttachments(ids, selectedField);
					});
				});
		}

		processZipAttachments(ids, field) {
			const idsString = ids.join(',');
			const entityType = this.view.collection.name;

			Espo.Ui.info('Probíhá export do zipu. Prosím čekejte...');

			const url = `/api/v1/Attachment/action/zip?entityType=${entityType}&field=${field}&ids=${idsString}`;
			window.open(url, '_blank');
		}
	};
});
