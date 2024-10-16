define('accounting:views/invoice/modals/discount-dialog', [
	'views/modal',
	'model',
], function (Dep, Model) {
	return Dep.extend({
		className: 'dialog dialog-record',

		templateContent: `<div class="record no-side-margin">{{{record}}}</div>`,
		backdrop: true,

		setup: function () {
			let title = 'Add discount'; // assuming it's passed by our parent view

			this.headerText = title;
			// this.headerHtml = this.getHelper().escapeString(title);

			this.formModel = new Model();
			this.formModel.name = 'None'; // dummy name, important

			// action buttons
			this.buttonList = [
				{
					name: 'addDiscount', // handler for 'doSomething' action is bellow
					html: this.translate('Add discount', 'labels', 'Invoice'), // button label
					style: 'danger',
				},
				{
					name: 'cancel',
					label: 'Cancel',
				},
			];

			// define fields
			this.formModel.setDefs({
				fields: {
					discountType: {
						type: 'enum', // field type
						options: ['itemDiscount', 'orderDiscount'],
						required: true, // field param
						translation: 'Invoice.labels',
					},
					discount: {
						type: 'int',
					},
				},
			});

			this.createView('record', 'views/record/edit-for-modal', {
				scope: 'None', // dummy name
				model: this.formModel,
				el: this.getSelector() + ' .record',
				detailLayout: [
					// form layout
					{
						rows: [
							[
								{
									name: 'discount',
									labelText: this.translate(
										'discount',
										'fields',
										'Invoice',
									),
								},
							],
							[
								{
									name: 'discountType',
									labelText: this.translate(
										'discountType',
										'labels',
										'MyScope',
									),
								},
							],
						],
					},
				],
			});
		},

		actionAddDiscount: function () {
			// fetch data from form to model and validate
			let isValid = this.getView('record').processFetch();

			if (!isValid) {
				return;
			}

			const response = {
				type: this.formModel.get('discountType'),
				ammount: this.formModel.get('discount'),
			};

			Espo.Ui.success(this.translate('Done'));

			// event 'done' will be caught by the parent view
			this.trigger('done', response);
			this.close();
		},
	});
});
