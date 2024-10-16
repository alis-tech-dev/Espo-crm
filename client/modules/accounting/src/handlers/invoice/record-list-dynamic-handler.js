define(['autocrm:record-list-dynamic-handler'], Dep => {
	/**
	 * @extends module:autocrm:record-list-dynamic-handler.Class
	 * @memberOf module:accounting:handlers/invoice/record-list-dynamic-handler
	 */
	class Class extends Dep {
		init() {
			this.roundMultiplier = Math.pow(
				10,
				this.parentView.getConfig().get('currencyDecimalPlaces'),
			);
		}

		onChangeUnitPrice() {
			this.recalculate();
		}

		onChangeDiscount() {
			this.recalculate();
		}

		onChangeTaxRate() {
			this.recalculate();
		}

		onChangeWithTax() {
			this.recalculate();
		}

		onChangeQuantity() {
			this.recalculate();
		}

		recalculate() {
			const quantity = this.model.get('quantity') || 0;
			const unitPrice = this.model.get('unitPrice') || 0;
			const withTax = this.model.get('withTax') || false;
			const taxRate = this.model.get('taxRate') || 0;
			const discount = this.model.get('discount') || 0;

			let amount = withTax
				? (unitPrice * quantity) / (1 + taxRate / 100)
				: unitPrice * quantity;
			amount -= (amount * discount) / 100;
			const amountWithTax = amount * (1 + taxRate / 100);
			const taxAmount = amountWithTax - amount;

			const data = {
				amount: this.round(amount),
				amountWithTax: this.round(amountWithTax),
				taxAmount: this.round(taxAmount),
			};

			this.processDataBeforeSet(data);

			setTimeout(() => {
				this.model.set(data);
			}, 0);
		}

		/**
		 * @protected
		 * @param data
		 */
		//eslint-disable-next-line no-unused-vars
		processDataBeforeSet(data) {}

		round(num) {
			return (
				Math.round(num * this.roundMultiplier) / this.roundMultiplier
			);
		}
	}

	return Class;
});
