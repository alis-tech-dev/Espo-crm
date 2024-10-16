define(['views/fields/int', 'views/fields/duration'], (Dep, Duration) => {
	return class extends Dep {
		setup() {}

		//This function has to return the actual time elapsed, not the time that's actually stored.
		getValueForDisplay() {
			const secondsTotal = this.model.get(this.name);

			if (secondsTotal >= 3600) {
				return Duration.prototype.stringifyDuration.call(
					this,
					secondsTotal,
				);
			}

			const minutes = Math.floor(secondsTotal / 60);
			const seconds = secondsTotal % 60;

			return `${minutes}min ${seconds < 10 ? '0' : ''}${seconds}s`;
		}
	};
});
