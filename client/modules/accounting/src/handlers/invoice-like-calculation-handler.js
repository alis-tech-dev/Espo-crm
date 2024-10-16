define(['accounting:handlers/calculation-handler'], Dep => {
	/**
	 * @extends module:accounting:handlers/calculation-handler.Class
	 * @memberOf module:accounting:handlers/invoice/record-list-dynamic-handler
	 */
	class Class extends Dep {
		calculateTotals() {
			const items = this.model.get('itemsRecordList') || [];

			const advanceDeductions =
				this.model.get('advanceDeductionsRecordList') || [];

			const currency = this.model.get('amountCurrency');
			let amount = 0,
				preDiscountedAmount = 0,
				taxAmount = 0;
			let paidAdvances = 0;

			items.forEach(item => {
				amount += item.amount || 0;

				taxAmount += item.taxAmount || 0;

				if (item.type === 'discount') return;

				preDiscountedAmount += this.round(
					item.withTax
						? (item.unitPrice * item.quantity) /
								(1 + item.taxRate / 100)
						: item.unitPrice * item.quantity,
				);
			});

			advanceDeductions.forEach(item => {
				paidAdvances += item.amountWithTax || 0;
			});

			const grandTotalAmount = amount + taxAmount - paidAdvances;

			const data = {
				amount: this.round(amount),
				taxAmount: this.round(taxAmount),
				taxAmountCurrency: currency,
				grandTotalAmount: this.round(grandTotalAmount),
				grandTotalAmountCurrency: currency,
				paidAdvances: this.round(paidAdvances),
				paidAdvancesCurrency: currency,
				invoicedAmount: this.round(amount + taxAmount),
				invoicedAmountCurrency: currency,
			};

			if (this.model.hasField('preDiscountedAmount')) {
				data.preDiscountedAmount = this.round(preDiscountedAmount);
				data.preDiscountedAmountCurrency = currency;
			}

			if (this.model.hasField('discountAmount')) {
				data.discountAmount = this.round(preDiscountedAmount - amount);
				data.discountAmountCurrency = currency;
			}

			this.processDataBeforeSet(data);

			setTimeout(() => {
				this.model.set(data);
			}, 1);
		}

		/**
		 * To be extended.
		 *
		 * @protected
		 * @param data
		 */
		// eslint-disable-next-line no-unused-vars
		processDataBeforeSet(data) {}
	}

	return Class;
});
