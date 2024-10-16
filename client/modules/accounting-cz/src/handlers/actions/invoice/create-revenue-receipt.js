define(
	'accounting-cz:handlers/actions/invoice/create-revenue-receipt',
	'action-handler',
	function (Dep) {
		return Dep.extend({
			actionCreateRevenueReceipt: function () {
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
				options.attributes.skipFillDefaultValues = true;
				options.attributes.dateInvoiced = now
					.toISOString()
					.substring(0, 10);
				options.attributes.dateOfReceiving = now
					.toISOString()
					.substring(0, 10);
				options.attributes.itemsIds = null;

				options.attributes.itemsRecordList.forEach(function (item) {
					item.id = null;
				});

				delete options.attributes.number;

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
					.navigate('RevenueReceipt/create', { trigger: false });
				this.view
					.getRouter()
					.dispatch('RevenueReceipt', 'create', options);
			},
		});
	},
);
