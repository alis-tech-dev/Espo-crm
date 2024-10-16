define(['accounting:handlers/invoice/record-list-dynamic-handler'], Dep => {
	/**
	 * @extends module:autocrm:record-list-dynamic-handler.Class
	 * @memberOf module:accounting:handlers/invoice/record-list-dynamic-handler
	 */
	class Class extends Dep {
		init() {
			Dep.prototype.init.call(this);

			this.rowView.listenTo(
				this.parentModel,
				'change:reverseCharge change:foreignInvoicing',
				() => this.recalculate(),
			);
		}

		onChangeTaxRate() {
			this.recalculate();
		}

		recalculate() {
			const reverseCharge =
				this.parentModel.get('reverseCharge') || false;

			const quantity = this.model.get('quantity') || 0;
			const unitPrice = this.model.get('unitPrice') || 0;
			const withTax = this.model.get('withTax') || false;
			const taxRate = this.model.get('taxRate') || 0;
			const discount = this.model.get('discount') || 0;

			let amount = withTax
				? (unitPrice * quantity) / (1 + taxRate / 100)
				: unitPrice * quantity;
			amount -= (amount * discount) / 100;
			const amountWithTax = reverseCharge
				? amount
				: amount * (1 + taxRate / 100);
			const taxAmount = amountWithTax - amount;

			this.model.set('amount', this.round(amount));
			this.model.set('amountWithTax', this.round(amountWithTax));
			this.model.set('taxAmount', this.round(taxAmount));
		}
	}

	return Class;
});
