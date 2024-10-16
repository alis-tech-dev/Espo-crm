define('accounting-cz:handlers/invoice/dynamic-handler', [
	'accounting:handlers/invoice/dynamic-handler',
], function (Dep) {
	return Dep.extend({
		supplyCodesCZ: [
			'',
			'1',
			'1a',
			'3',
			'3a',
			'4',
			'4a',
			'5',
			'6',
			'7',
			'11',
			'12',
			'13',
			'14',
			'15',
			'16',
			'17',
			'18',
			'19',
			'20',
			'21',
		],
		supplyCodesEU: ['foreign', '0eu', '1eu', '2eu', '3eu'],

		round: function (num) {
			const roundMultiplier = Math.pow(
				10,
				this.recordView.getConfig().get('currencyDecimalPlaces'),
			);

			return Math.round(num * roundMultiplier) / roundMultiplier;
		},

		onChangeReverseCharge() {
			this.controlReverseCharge();
			this.calculateSummaryVatRates();
			this.controlReverseChargeText();
			this.controlSupplyCodes();
		},

		onChangeForeignInvoicing() {
			this.controlReverseCharge();
			this.calculateSummaryVatRates();
			this.controlSupplyCodes();
		},

		onChangeItemsRecordList: function () {
			this.calculateSummaryVatRates();
		},

		onChangeShippingCost: function () {
			Dep.prototype.onChangeShippingCost.call(this);
			this.calculateSummaryVatRates();
		},

		onChangeShippingCostTaxRate: function () {
			//Dep.prototype.onChangeShippingCostTaxRate.call(this);
			this.calculateSummaryVatRates();
		},

		onChangeTaxRound: function () {
			this.calculateSummaryVatRates();
		},
		onChangeAmountRound: function () {
			this.calculateSummaryVatRates();
		},
		onChangeAmountRoundTo: function () {
			this.calculateSummaryVatRates();
		},
		onChangeVatFromRoundedTotal: function () {
			this.calculateSummaryVatRates();
		},

		onChangeGrandTotalAmount: function () {
			this.calculateRemainsToPay();
		},

		onChangePartialPaymentsRecordList: function () {
			this.calculateRemainsToPay();
		},

		init: function () {
			Dep.prototype.init.call(this);
			this.calculateSummaryVatRates();
			this.calculateRemainsToPay();
		},

		calculateSummaryVatRates: function () {
			const items =
				Espo.Utils.cloneDeep(this.model.get('itemsRecordList')) || [];
			const currency = this.model.get('amountCurrency');
			const roundType = this.model.get('taxRound');
			let summaryVatRates = [];

			items.forEach(item => {
				this.updateSummaryVatRates(
					summaryVatRates,
					currency,
					item.amount || 0,
					item.taxRate || 0,
					item.taxAmount || 0,
					roundType || 'DontRound',
				);
			});

			if (this.model.get('vatFromRoundedTotal') === false) {
				summaryVatRates = this.roundVatRates(
					summaryVatRates,
					this.model.get('taxRound'),
				);
			}

			let amountRoundTo;

			if (this.model.get('amountRoundTo') === 'fifties') {
				amountRoundTo = 2;
			} else if (this.model.get('amountRoundTo') === 'decimals') {
				amountRoundTo = 10;
			} else {
				amountRoundTo = 1;
			}
			if (this.model.get('amountRound') === 'upRound') {
				summaryVatRates.forEach(item => {
					item.basis =
						Math.ceil(item.basis * amountRoundTo) / amountRoundTo;
					item.total = item.vat + item.basis;
				});
			} else if (this.model.get('amountRound') === 'downRound') {
				summaryVatRates.forEach(item => {
					item.basis =
						Math.floor(item.basis * amountRoundTo) / amountRoundTo;
					item.total = item.vat + item.basis;
				});
			} else if (this.model.get('amountRound') === 'mathRound') {
				summaryVatRates.forEach(item => {
					item.basis =
						Math.round(item.basis * amountRoundTo) / amountRoundTo;
					item.total = item.vat + item.basis;
				});
			}
			if (
				this.model.get('vatFromRoundedTotal') &&
				this.model.get('amountRound') !== 'dontRound'
			) {
				summaryVatRates = this.roundVatRates(
					summaryVatRates,
					this.model.get('taxRound'),
				);
			}

			if (this.calculationHandler) {
				this.calculationHandler.calculateTotals();
			}

			setTimeout(() => {
				this.model.set({
					summaryVatRatesRecordList: Object.values(summaryVatRates),
				});
			}, 0);
		},

		roundVatRates: function (summaryVatRates, roundType) {
			summaryVatRates.forEach(item => {
				if (roundType === 'allRound.1') {
					item.vat = this.round(Math.round(item.vat / 0.1) * 0.1);
				} else if (roundType === 'allRound.5') {
					item.vat = this.round(Math.round(item.vat / 0.5) * 0.5);
				} else if (roundType === 'allRound1') {
					item.vat = this.round(Math.round(item.vat));
				}

				item.total = item.vat + item.basis;
			});

			return summaryVatRates;
		},

		updateSummaryVatRates: function (
			summaryVatRates,
			currency,
			amount,
			taxRate,
			taxAmount,
			roundVatRates = '',
		) {
			const reverseCharge = this.model.get('reverseCharge');

			if (roundVatRates === 'itesRound.1') {
				taxAmount = this.round(
					Math.round(
						(taxAmount ? taxAmount : amount * (taxRate / 100.0)) /
							0.1,
					) * 0.1,
				);
			} else if (roundVatRates === 'itesRound.5') {
				taxAmount = this.round(
					Math.round(
						(taxAmount ? taxAmount : amount * (taxRate / 100.0)) /
							0.5,
					) * 0.5,
				);
			} else if (roundVatRates === 'itesRound1') {
				taxAmount = this.round(
					Math.round(
						taxAmount ? taxAmount : amount * (taxRate / 100.0),
					),
				);
			} else {
				taxAmount = this.round(
					taxAmount ? taxAmount : amount * (taxRate / 100.0),
				);
			}

			if (summaryVatRates[taxRate]) {
				summaryVatRates[taxRate].basis += amount;
				summaryVatRates[taxRate].vat += reverseCharge
					? 0
					: taxAmount
						? taxAmount
						: this.round(amount * (taxRate / 100.0));
				summaryVatRates[taxRate].total +=
					amount +
					(reverseCharge
						? 0
						: taxAmount
							? taxAmount
							: this.round(amount * (taxRate / 100.0)));
			} else {
				summaryVatRates[taxRate] = {
					taxRate: taxRate,
					basis: amount,
					basisCurrency: currency,
					vat: reverseCharge
						? 0
						: taxAmount
							? taxAmount
							: this.round(amount * (taxRate / 100.0)),
					vatCurrency: currency,
					total:
						amount +
						(reverseCharge
							? 0
							: taxAmount
								? taxAmount
								: this.round(amount * (taxRate / 100.0))),
					totalCurrency: currency,
				};
			}
		},

		calculateRemainsToPay() {
			const grandTotalAmount = this.model.get('grandTotalAmount') || 0;
			if (
				this.model.get('status') === 'Partially Paid' &&
				this.model.get('partialPaymentsRecordList')
			) {
				const partialPaymentsRecordList = this.model.get(
					'partialPaymentsRecordList',
				);

				let partiallyPaidAmount = 0;
				partialPaymentsRecordList.forEach(partialPayments => {
					if (partialPayments.amount) {
						partiallyPaidAmount += partialPayments.amount;
					}
				});
				const roundMultiplier = Math.pow(10, 2);

				let remainsToPay = grandTotalAmount - partiallyPaidAmount;

				remainsToPay =
					Math.round(remainsToPay * roundMultiplier) /
					roundMultiplier;

				this.model.set('remainsToPay', remainsToPay);
			} else {
				if (this.model.get('status') === 'Paid') {
					this.model.set('remainsToPay', 0);
				} else {
					this.model.set('remainsToPay', grandTotalAmount);
				}
			}
			if (this.model.get('remainsToPayCurrency') === null) {
				this.model.set(
					'remainsToPayCurrency',
					this.recordView.getConfig().get('defaultCurrency'),
				);
			}
		},

		processDataBeforeSet: function (data, amountCurrency) {
			const itemCurrencyFields =
				this.getCurrencyFieldsForScope('SummaryVatRates');

			data.summaryVatRatesRecordList = Espo.Utils.cloneDeep(
				this.model.get('summaryVatRatesRecordList') || [],
			);

			data.summaryVatRatesRecordList.forEach(item => {
				itemCurrencyFields.forEach(field => {
					item[field + 'Currency'] = amountCurrency;
				});
			});

			return data;
		},

		controlSupplyCodes: function () {
			if (this.model.get('reverseCharge')) {
				if (this.model.get('foreignInvoicing')) {
					this.setSupplyCodeOptions(this.supplyCodesEU);
				} else {
					this.setSupplyCodeOptions(this.supplyCodesCZ);
				}
			}
		},

		setSupplyCodeOptions: function (supplyCodes) {
			this.recordView.setFieldOptionList('supplyCode', supplyCodes);

			if (!supplyCodes.includes(this.model.get('supplyCode'))) {
				setTimeout(() => {
					this.model.set('supplyCode', supplyCodes[0]);
				}, 0);
			}
		},

		controlReverseCharge: function () {
			const foreignInvoicing = this.model.get('foreignInvoicing');
			const reverseCharge = this.model.get('reverseCharge');

			if (foreignInvoicing && reverseCharge) {
				const items =
					Espo.Utils.cloneDeep(this.model.get('itemsRecordList')) ||
					[];

				items.forEach(item => {
					if (foreignInvoicing && reverseCharge) {
						item.taxRate = 0;
					}

					item.withTax = false;
				});

				setTimeout(() => {
					this.model.set('itemsRecordList', items);
					this.calculateSummaryVatRates();
				}, 1);
			}
		},

		controlReverseChargeText: function () {
			if (this.model.get('reverseCharge')) {
				const reverseChargeText = this.recordView.translate(
					'reverseChargeText',
					'messages',
				);
				let textAfterItems = this.model.get('textAfterItems') || '';

				if (textAfterItems) {
					textAfterItems += '\n' + reverseChargeText;
				} else {
					textAfterItems = reverseChargeText;
				}

				setTimeout(() => {
					this.model.set('textAfterItems', textAfterItems);
				}, 1);
			} else {
				const reverseChargeText = this.recordView.translate(
					'reverseChargeText',
					'messages',
				);
				let textAfterItems = this.model.get('textAfterItems') || '';

				const regex = new RegExp(`(\n)?${reverseChargeText}`, 'g');
				textAfterItems = textAfterItems.replace(regex, '');

				setTimeout(() => {
					this.model.set('textAfterItems', textAfterItems);
				}, 1);
			}
		},
	});
});
