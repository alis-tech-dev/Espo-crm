define(
	'accounting-cz:handlers/actions/received-invoice/create-expense-receipt',
	'action-handler',
	function (Dep) {
		return Dep.extend({
			actionCreateExpenseReceipt: function () {
				var now = new Date();

				const options = {
					attributes: this.view.model.attributes,
				};

				options.attributes.paymentPurpose =
					'Úhrada faktury ' + options.attributes.number;
				options.attributes.invoiceId = options.attributes.id;
				options.attributes.invoiceName = options.attributes.name;
				options.attributes.invoiceType = this.view.scope;
				options.attributes.id = null;
				options.attributes.dateInvoiced = now
					.toISOString()
					.substring(0, 10);
				options.attributes.dateOfReceiving = now
					.toISOString()
					.substring(0, 10);
				options.attributes.loadSupplierData = true;

				let returnDispatchParams = {
					controller: this.view.scope,
					action: null,
					options: {
						isReturn: true,
					},
				};

				_.extend(options, {
					returnUrl: this.view.getRouter().getCurrentUrl(),
					returnDispatchParams: returnDispatchParams,
				});

				this.view
					.getRouter()
					.navigate('ExpenseReceipt/create', { trigger: false });
				this.view
					.getRouter()
					.dispatch('ExpenseReceipt', 'create', options);
			},
		});
	},
);
