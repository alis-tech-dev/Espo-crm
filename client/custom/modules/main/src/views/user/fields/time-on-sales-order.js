define(['views/fields/int'], Dep => {
	return class extends Dep {
		getValueForDisplay() {
			let secondsTotal = this.model.get(this.name);

			if (!secondsTotal) {
				return '0';
			}

			if (secondsTotal < 60) {
				return '0';
			}

			let d = secondsTotal;
			let days = Math.floor(d / 86400);
			d = d % 86400;

			let hours = Math.floor(d / 3600);
			d = d % 3600;
			let minutes = Math.floor(d / 60);

			let parts = [];

			if (days) {
				parts.push(
					days +
						'' +
						this.getLanguage().translate('d', 'durationUnits'),
				);
			}

			if (hours) {
				parts.push(
					hours +
						'' +
						this.getLanguage().translate('h', 'durationUnits'),
				);
			}

			if (minutes) {
				parts.push(
					minutes +
						'' +
						this.getLanguage().translate('m', 'durationUnits'),
				);
			}

			return parts.join(' ');
		}
	};
});
