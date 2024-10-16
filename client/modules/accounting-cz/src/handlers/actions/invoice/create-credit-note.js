define(['action-handler'], ActionHandler => {
	return class extends ActionHandler {
		actionCreateCreditNote() {
			const { view } = this;

			const dateTime = view.getDateTime();

			const options = {
				attributes: view.model.attributes,
			};

			options.attributes.invoicesIds = [options.attributes.id];
			options.attributes.dateInvoiced = dateTime.getToday();
			options.attributes.dateOfReceiving = dateTime.getToday();

			delete options.attributes.itemsIds;
			delete options.attributes.id;
			delete options.attributes.name;
			delete options.attributes.number;
			delete options.attributes.numberA;

			options.attributes.itemsRecordList.forEach(function (item) {
				item.unitPrice = -item.unitPrice;
				item.amount = -item.amount;
				item.taxAmount = -item.taxAmount;
				item.amountWithTax = -item.amountWithTax;

				delete item.id;
			});

			const returnDispatchParams = {
				controller: view.scope,
				action: null,
				options: {
					isReturn: true,
				},
			};

			_.extend(options, {
				returnUrl: view.getRouter().getCurrentUrl(),
				returnDispatchParams: returnDispatchParams,
			});

			view.getRouter().navigate('CreditNote/create', { trigger: false });
			view.getRouter().dispatch('CreditNote', 'create', options);
		}
	};
});
