define(['views/modal', 'model'], (Modal, Model) => {
	return class extends Modal {
		className = 'dialog dialog-record new-payment-modal';

		templateContent = '<div class="record">{{{record}}}</div>';

		scope = 'Payment';

		parentEntityType = this.options.attributes.parentEntityType;

		followupDocumentOptions = [
			'FinalInvoicePaid',
			'FinalInvoice',
			'TaxDocument',
			'None',
		];

		unmarkAsPaidOptions = ['TaxDocument', 'None'];

		companyVatPayer;

		backdrop = true;

		async setup() {
			let followupDocumentInLayout = false;

			if (this.parentEntityType === 'ProformaInvoice') {
				this.companyVatPayer = this.getConfig().get('companyVatPayer');

				if (!this.companyVatPayer) {
					this.followupDocumentOptions.splice('TaxDocument', 1);
				}

				followupDocumentInLayout = { name: 'followupDocument' };
			}

			this.events['keyup input[data-name="amount"]'] = () => {
				const value = this.getView('record')
					.getFieldView('amount')
					.fetch();

				this.dynamicHandler.onChangeAmount(
					this.formModel,
					value.amount,
				);
			};

			this.headerText =
				this.translate(
					'Record Payment for Invoice',
					'labels',
					this.scope,
				) +
				' ' +
				this.options.attributes.data.number;

			this.buttonList = [
				{
					name: 'paidToday',
					label: 'Paid Today',
					style: 'success',
				},
				{
					name: 'paid',
					label: 'Record Payment Date',
					style: 'success',
				},
				{
					name: 'paidDueDate',
					label: 'Paid on Due Date',
				},
				{
					name: 'cancel',
					label: 'Cancel',
				},
			];

			this.hideButton('paid');

			this.formModel = new Model();
			this.formModel.name = this.scope;

			this.formModel.setDefs({
				fields: {
					account: {
						type: 'link',
						entity: 'Account',
						readOnly: true,
					},
					grandTotalAmount: {
						type: 'currency',
						readOnly: true,
					},
					remainingToPay: {
						type: 'currency',
						readOnly: true,
					},
					paidOn: {
						type: 'date',
					},
					amount: {
						type: 'currency',
						view: 'product-base:views/fields/currency-amount-only',
					},
					markAsPaid: {
						type: 'bool',
					},
					followupDocument: {
						type: 'enum',
						options: this.followupDocumentOptions,
						default: 'FinalInvoicePaid',
					},
					variableSymbol: {
						type: 'varchar',
					},
				},
			});

			const dateTime = this.getDateTime();

			let variableSymbol = '';

			if (this.options.attributes.data.number) {
				variableSymbol = this.options.attributes.data.number
					.match(/(\d+)/g)
					.join('');
			}

			this.formModel.set({
				accountId: this.options.attributes.data.accountId,
				accountName: this.options.attributes.data.accountName,
				grandTotalAmount: this.options.attributes.data.grandTotalAmount,
				grandTotalAmountCurrency:
					this.options.attributes.data.amountCurrency,
				remainingToPay: this.options.attributes.data.remainingToPay,
				remainingToPayCurrency:
					this.options.attributes.data.amountCurrency,
				paidOn: dateTime.getToday(),
				amount: this.options.attributes.data.remainingToPay,
				amountCurrency: this.options.attributes.data.amountCurrency,
				markAsPaid: true,
				variableSymbol: variableSymbol,
			});

			await this.createView('record', 'views/record/edit-for-modal', {
				scope: this.scope,
				model: this.formModel,
				el: this.getSelector() + ' .record',
				/*dynamicLogicDefs: {
					fields: {
						markAsPaid: {
							visible: {
								conditionGroup: [
									{
										type: 'lessThanOrEquals',
										attribute: 'remainingToPay',
										value: 0,
									},
								],
							},
						},
					},
				},*/
				detailLayout: [
					{
						rows: [
							[
								{
									name: 'account',
								},
								{
									name: 'grandTotalAmount',
								},
								{
									name: 'remainingToPay',
								},
							],
						],
					},
					{
						label: 'Payment Details',
						rows: [
							[
								{
									name: 'paidOn',
								},
								{
									name: 'amount',
								},
							],
							[
								{
									name: 'markAsPaid',
								},
								followupDocumentInLayout,
							],
							[
								{
									name: 'variableSymbol',
								},
								false,
							],
						],
					},
				],
			});

			if (this.parentEntityType === 'ProformaInvoice') {
				this.listenTo(this.formModel, 'change:markAsPaid', () => {
					this.controlFollowupDocumentOptions();
				});
			}

			this.initDynamicHandler();
		}

		actionPaidToday() {
			this.actionPaid();
		}

		actionPaidDueDate() {
			const dueDate = this.options.attributes.data.dueDate;

			if (dueDate) {
				this.formModel.set('paidOn', dueDate);
			}

			this.actionPaid();
		}

		async actionPaid() {
			Espo.Ui.notify(' ... ');

			this.disableButton('paidToday');
			this.disableButton('paid');
			this.disableButton('paidDueDate');
			this.disableButton('cancel');

			const data = this.formModel.attributes;

			data.entityType = this.parentEntityType;
			data.id = this.options.attributes.data.id;

			const response = await Espo.Ajax.postRequest(
				this.scope + '/action/createPayment',
				data,
			);

			if (response.success) {
				Espo.Ui.notify(false);

				this.getParentView().model.trigger('update-all');

				this.close();
			}
		}

		reRenderFooter() {
			if (!this.dialog) {
				return;
			}

			this.updateDialog();

			const html = this.dialog.getFooter();

			this.$el.find('footer.modal-footer').replaceWith(html);

			this.dialog.initButtonEvents();
		}

		initDynamicHandler() {
			let dynamicHandlerClassName =
				'accounting-cz:handlers/modals/new-payment/dynamic-handler';

			let init = dynamicHandler => {
				this.listenTo(this.formModel, 'change', (model, o) => {
					if ('onChange' in dynamicHandler) {
						dynamicHandler.onChange.call(dynamicHandler, model, o);
					}

					let changedAttributes = model.changedAttributes();

					for (let attribute in changedAttributes) {
						let methodName =
							'onChange' + Espo.Utils.upperCaseFirst(attribute);

						if (methodName in dynamicHandler) {
							dynamicHandler[methodName].call(
								dynamicHandler,
								model,
								changedAttributes[attribute],
								o,
							);
						}
					}
				});

				if ('init' in dynamicHandler) {
					dynamicHandler.init();
				}
			};

			if (dynamicHandlerClassName) {
				this.wait(
					new Promise(resolve => {
						require(dynamicHandlerClassName, DynamicHandler => {
							let dynamicHandler = (this.dynamicHandler =
								new DynamicHandler(this));

							init(dynamicHandler);

							resolve();
						});
					}),
				);
			}
		}

		controlFollowupDocumentOptions() {
			const followupDocumentField =
				this.getView('record').getFieldView('followupDocument');

			if (this.formModel.get('markAsPaid')) {
				followupDocumentField.resetOptionList();

				this.formModel.set(
					'followupDocument',
					this.followupDocumentOptions[0],
				);

				return;
			}

			followupDocumentField.setOptionList(this.unmarkAsPaidOptions);
		}
	};
});
