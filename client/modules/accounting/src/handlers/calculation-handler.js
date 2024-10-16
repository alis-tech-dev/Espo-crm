define(() => {
	/**
	 * @memberOf module:accounting:handlers/calculation-handler
	 */
	class Class {
		/**
		 * @param {module:model.Class} model
		 * @param {module:models/settings.Class} config
		 */
		constructor(model, config) {
			this.model = model;
			this.config = config;
			this.roundMultiplier = Math.pow(
				10,
				this.config.get('currencyDecimalPlaces'),
			);
		}

		/**
		 * Rounds a number to the specified number of decimal places.
		 *
		 * @public
		 * @param {number} num
		 * @returns {number}
		 */
		round(num) {
			return (
				Math.round(num * this.roundMultiplier) / this.roundMultiplier
			);
		}

		/**
		 * Calculates totals.
		 *
		 * @abstract
		 * @public
		 * @returns {void}
		 */
		calculateTotals() {
			throw new Error('Not implemented');
		}
	}

	return Class;
});
