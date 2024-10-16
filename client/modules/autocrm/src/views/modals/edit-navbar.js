define(['views/modal', 'model'], (Dep, Model) => {
	return class extends Dep {
		templateContent = '<div class="record no-side-margin">{{{record}}}</div>';

		setup() {
			super.setup();

			this.headerText = this.translate('Edit Navbar', 'labels', 'Navbar');

			this.buttonList = [
				{
					name: 'save',
					label: 'Save',
					style: 'primary',
				},
				{
					name: 'cancel',
					label: 'Cancel',
				},
			];

			this.model = new Model();
			this.model.urlRoot = 'Settings';
			this.model.name = 'Settings';

			this.model.id = '1';

			this.model.setDefs({
				fields: {
					tabList: {
						type: 'array',
						view: 'views/settings/fields/tab-list',
						validationList: ['array', 'required'],
						mandatoryValidationList: ['array'],
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
									name: 'tabList',
								},
							],
						],
					},
				],
			});

			this.wait(this.model.fetch());
		}

		actionSave() {
			const recordView = this.getView('record');
			if (recordView.validate()) {
				return;
			}

			const data = recordView.fetch();
			this.model.set(data);

			this.model
				.save()
				.then(() => {
					this.trigger('after:save');
					this.notify('Saved', 'success');
					this.close();
					// Refresh the page after saving
					window.location.reload();
				})
				.catch(error => {
					this.notify('Error saving', 'error');
					console.error('Error saving model:', error);
				});
		}
	};
});
