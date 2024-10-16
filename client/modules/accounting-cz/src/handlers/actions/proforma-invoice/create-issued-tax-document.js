define(['action-handler'], ActionHandler => {
	return class extends ActionHandler {
		actionCreateIssuedTaxDocument() {
			const { view } = this;

			const dateTime = view.getDateTime();

			const options = {
				attributes: view.model.attributes,
			};

			options.attributes.dateInvoiced = dateTime.getToday();
			options.attributes.dueDate = dateTime.getToday();
			options.attributes.dateInvoiced = dateTime.getToday();
			options.attributes.duzp = dateTime.getToday();

			options.attributes.textBeforeItems =
				'NEPLAŤTE - doklad je již uhrazen!';
			options.attributes.skipFillDefaultValues = true;
			options.attributes.proformaInvoiceId = options.attributes.id;
			options.attributes.proformaInvoiceName = options.attributes.name;

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
			delete options.attributes.number;
			delete options.attributes.id;
			delete options.attributes.itemsIds;

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

			view.getRouter().navigate('IssuedTaxDocument/create', {
				trigger: false,
			});
			view.getRouter().dispatch('IssuedTaxDocument', 'create', options);
		}
	};
});
