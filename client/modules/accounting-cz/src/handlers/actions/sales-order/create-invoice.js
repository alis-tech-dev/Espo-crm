define(
	'accounting-cz:handlers/actions/sales-order/create-invoice',
	'action-handler',
	function (Dep) {
		return Dep.extend({
			actionCreateInvoice: function () {
				var now = new Date();

				const options = {
					attributes: this.view.model.attributes,
				};

				delete options.attributes.itemsIds;
				delete options.attributes.itemsNames;

				options.attributes.itemsRecordList.forEach(function (item) {
					item.id = null;
					item.amount = item.quantity * item.unitPrice;
					item.unit = 'ks';
				});

				options.attributes.assignedUserId = this.view.getUser().id;
				options.attributes.assignedUserName =
					this.view.getUser().get('name');
				options.attributes.salesOrderId = options.attributes.id;
				options.attributes.salesOrderName = options.attributes.name;
				options.attributes.subscriberLinkId =
					options.attributes.accountId;
				options.attributes.subscriberLinkName =
					options.attributes.accountName;
				options.attributes.subscriberLinkType = 'Account';
				options.attributes.dateInvoiced = now
					.toISOString()
					.substring(0, 10);
				options.attributes.dueDate = now.toISOString().substring(0, 10);
				options.attributes.duzp = now.toISOString().substring(0, 10);
				options.attributes.number = null;
				options.attributes.id = null;

				let returnDispatchParams = {
					controller: this.view.scope,
					action: null,
					options: {
						isReturn: true,
					},
				};

				options.attributes.status = null;

				_.extend(options, {
					returnUrl: this.view.getRouter().getCurrentUrl(),
					returnDispatchParams: returnDispatchParams,
				});

				this.view
					.getRouter()
					.navigate('Invoice/create', { trigger: false });
				this.view.getRouter().dispatch('Invoice', 'create', options);
			},
		});
	},
);
