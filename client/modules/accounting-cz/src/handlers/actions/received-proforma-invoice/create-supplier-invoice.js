define(
	'accounting-cz:handlers/actions/received-proforma-invoice/create-supplier-invoice',
	'action-handler',
	function (Dep) {
		return Dep.extend({
			actionCreateSupplierInvoice: function () {
				const options = {
					attributes: this.view.model.attributes,
				};

				options.attributes.assignedUserId = this.view.getUser().id;
				options.attributes.assignedUserName =
					this.view.getUser().get('name');
				options.attributes.receivedProformaInvoiceId =
					options.attributes.id;
				options.attributes.receivedProformaInvoiceName =
					options.attributes.name;
				options.attributes.variableSymbol = null;
				options.attributes.number = null;
				options.attributes.id = null;

				let returnDispatchParams = {
					controller: this.view.scope,
					action: null,
					options: {
						isReturn: true,
					},
				};

				this.view.model.save({ status: 'Paid' }, { patch: true });

				options.attributes.status = null;

				_.extend(options, {
					returnUrl: this.view.getRouter().getCurrentUrl(),
					returnDispatchParams: returnDispatchParams,
				});

				this.view
					.getRouter()
					.navigate('SupplierInvoice/create', { trigger: false });
				this.view
					.getRouter()
					.dispatch('SupplierInvoice', 'create', options);
			},
		});
	},
);
