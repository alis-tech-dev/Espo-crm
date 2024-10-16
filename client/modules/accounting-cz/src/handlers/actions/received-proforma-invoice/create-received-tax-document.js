define(['action-handler'], ActionHandler => {
	return class extends ActionHandler {
		actionCreateReceivedTaxDocument() {
			const { view } = this;

			const dateTime = view.getDateTime();

			const options = {
				attributes: view.model.attributes,
			};

			options.attributes.dueDate = dateTime.getToday();
			options.attributes.dateInvoiced = dateTime.getToday();
			options.attributes.duzp = dateTime.getToday();
			options.attributes.dateOfReceiving = dateTime.getToday();

			options.attributes.receivedProformaInvoiceId =
				options.attributes.id;
			options.attributes.receivedProformaInvoiceName =
				options.attributes.name;

			options.attributes.itemsRecordList = Object.values(
				options.attributes.itemsRecordList.reduce((acc, item) => {
					const taxRate = item.taxRate ?? 0;
					const withTax = item.withTax;
					const key = `${taxRate}_${withTax}`;

					if (!acc[key]) {
						acc[key] = {
							taxRate,
							withTax,
							unitPrice: 0,
							quantity: 1,
							unit: view.translate('pcs', 'units'),
							name:
								view.translate(
									'issuedTaxDocumentItemText',
									'messages',
								) +
								' ' +
								options.attributes.number,
							amount: 0,
							taxAmount: 0,
							amountWithTax: 0,
						};
					}

					acc[key].unitPrice += item.unitPrice * item.quantity;
					acc[key].amount += item.amount;
					acc[key].taxAmount += item.taxAmount;
					acc[key].amountWithTax += item.amountWithTax;

					return acc;
				}, {}),
			);

			delete options.attributes.status;
			delete options.attributes.expenseOriginalNumber;
			delete options.attributes.originalInvoiceFile;
			delete options.attributes.summaryVatRatesRecordList;
			delete options.attributes.itemsIds;
			delete options.attributes.number;
			delete options.attributes.id;

			let returnDispatchParams = {
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

			view.getRouter().navigate('ReceivedTaxDocument/create', {
				trigger: false,
			});
			view.getRouter().dispatch('ReceivedTaxDocument', 'create', options);
		}
	};
});
