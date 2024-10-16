define(['dynamic-handler', 'moment'], (DynamicHandler, Moment) => {
	return class extends DynamicHandler {
		accountFieldsToCopy = [
			'billingAddressStreet',
			'billingAddressCity',
			'billingAddressState',
			'billingAddressCountry',
			'billingAddressPostalCode',
			'shippingAddressStreet',
			'shippingAddressCity',
			'shippingAddressState',
			'shippingAddressCountry',
			'shippingAddressPostalCode',
			'sicCode',
			'vatId',
		];

		init() {
			const calculationHandlerCLassName =
				this.getMetadata().get([
					'clientDefs',
					this.model.name,
					'calculationHandler',
				]) || 'accounting:handlers/invoice-like-calculation-handler';

			Espo.loader
				.requirePromise(calculationHandlerCLassName)
				.then(CalculationHandler => {
					this.calculationHandler = new CalculationHandler(
						this.model,
						this.recordView.getConfig(),
					);
					this.calculationHandler.calculateTotals();
				});

			this.roundMultiplier = Math.pow(
				10,
				this.recordView.getConfig().get('currencyDecimalPlaces'),
			);

			this.controlCurrency();
		}

		onChangeAccountId() {
			const accountId = this.model.get('accountId');

			if (!accountId) {
				return;
			}

			this.recordView.getModelFactory().create('Account', model => {
				model.id = accountId;

				model.fetch().then(() => {
					const data = {};

					this.accountFieldsToCopy.forEach(field => {
						if (model.has(field)) {
							data[field] = model.get(field);
						}
					});

					if (model.get('defaultInvoiceDueDate')) {
						const dueDate = model.get('defaultInvoiceDueDate');

						let moment = Moment();

						data.dueDate = moment.add(dueDate, 'days').format();
					} else {
						const dueDate = this.model.getFieldParam(
							'dueDate',
							'default',
						);

						if (dueDate) {
							data.dueDate =
								this.model.parseDefaultValue(dueDate);
						} else {
							data.dueDate = null;
						}
					}
					this.model.set(data);
				});
			});
		}

		onChangeAmountCurrency() {
			this.controlCurrency();
		}

		onChangeItemsRecordList() {
			if (this.calculationHandler) {
				this.calculationHandler.calculateTotals();
			}
		}

		onChangeShippingCost() {
			if (!this.model.get('shippingCost')) {
				return;
			}

			const shippingCost = this.model.get('shippingCost') || 0;
			const shippingCostTaxRate =
				this.model.get('shippingCostTaxRate') || 0;
			let itemsRecordList = Espo.Utils.cloneDeep(
				this.model.get('itemsRecordList') || [],
			);

			let shippingItem = itemsRecordList.find(
				item => item.type === 'shipping',
			);

			const amount = shippingCost;
			const taxAmount = (shippingCost * shippingCostTaxRate) / 100;
			const amountWithTax = amount + taxAmount;

			if (shippingItem) {
				shippingItem.unitPrice = shippingCost;
				shippingItem.taxRate = shippingCostTaxRate;
				shippingItem.amount = this.round(amount);
				shippingItem.taxAmount = this.round(taxAmount);
				shippingItem.amountWithTax = this.round(amountWithTax);
			} else {
				shippingItem = {
					unitPrice: shippingCost,
					taxRate: shippingCostTaxRate,
					quantity: 1,
					name: 'Doprava',
					type: 'shipping',
					amount: this.round(amount),
					taxAmount: this.round(taxAmount),
					amountWithTax: this.round(amountWithTax),
				};
				itemsRecordList.push(shippingItem);
			}

			setTimeout(() => {
				this.model.set('itemsRecordList', itemsRecordList);
				if (this.calculationHandler) {
					this.calculationHandler.calculateTotals();
				}
			}, 0);
		}

		getCurrencyFieldsForScope(scope) {
			return this.recordView
				.getFieldManager()
				.getEntityTypeFieldList(scope, {
					type: 'currency',
				});
		}

		controlCurrency() {
			const amountCurrency = this.model.get('amountCurrency');

			if (typeof amountCurrency === 'undefined') {
				this.model.set(
					'amountCurrency',
					this.recordView.getConfig().get('defaultCurrency'),
				);
				return;
			}

			if (this.recordView.getFieldView('amount')) {
				this.recordView.getFieldView('amount').reRender();
			}

			const currencyFields = this.getCurrencyFieldsForScope(
				this.model.name,
			);
			const itemCurrencyFields = this.getCurrencyFieldsForScope(
				this.model.name + 'Item',
			);
			const data = {};

			currencyFields.forEach(field => {
				data[field + 'Currency'] = amountCurrency;
			});

			data.itemsRecordList = Espo.Utils.cloneDeep(
				this.model.get('itemsRecordList') || [],
			);

			data.itemsRecordList.forEach(item => {
				itemCurrencyFields.forEach(field => {
					item[field + 'Currency'] = amountCurrency;
				});
			});

			this.processControlCurrencyDataBeforeSet(data, amountCurrency);

			// prevents double-firing change event for record list
			setTimeout(() => {
				this.model.set(data);
			}, 0);
		}

		// eslint-disable-next-line no-unused-vars
		processControlCurrencyDataBeforeSet(data, amountCurrency) {}

		onChangeDiscount() {
			if (this.model.get('discount') === null) {
				return;
			}
			const discount = this.model.get('discount') || 0;
			let itemsRecordList = Espo.Utils.cloneDeep(
				this.model.get('itemsRecordList') || [],
			);

			const processed = {};

			const discountItems = itemsRecordList.reduce(
				(accumulator, item) => {
					const key = item.taxRate + '-' + item.withTax;

					if (processed[key]) {
						return accumulator;
					}

					const taxRateItems = itemsRecordList.filter(
						taxItem =>
							taxItem.taxRate === item.taxRate &&
							taxItem.withTax === item.withTax,
					);

					const unitPrice = taxRateItems.reduce(
						(total, taxRateItem) => {
							return (
								total +
								((taxRateItem.withTax
									? taxRateItem.amountWithTax
									: taxRateItem.amount) *
									discount) /
									100
							);
						},
						0,
					);

					processed[key] = true;

					const amount =
						unitPrice / (item.withTax ? 1 + item.taxRate / 100 : 1);
					const amountWithTax = amount * (1 + item.taxRate / 100);
					const taxAmount = amountWithTax - amount;

					return [
						...accumulator,
						{
							unitPrice: -unitPrice,
							withTax: item.withTax,
							taxRate: item.taxRate,
							quantity: 1,
							name: 'Sleva ' + discount + '%',
							type: 'discount',
							amount: -this.round(amount),
							taxAmount: -this.round(taxAmount),
							amountWithTax: -this.round(amountWithTax),
						},
					];
				},
				[],
			);

			const combinedItems = itemsRecordList.concat(discountItems);

			setTimeout(() => {
				this.model.set('itemsRecordList', combinedItems);
			}, 0);
		}

		round(num) {
			return (
				Math.round(num * this.roundMultiplier) / this.roundMultiplier
			);
		}
	};
});
