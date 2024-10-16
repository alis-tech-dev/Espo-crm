define(['views/fields/date'], Dep => {
	return class extends Dep {
		afterRender() {
			super.afterRender();

			if (this.getFieldParamValue('dateWarning')) this.checkDate();
		}

		checkDate() {
			const today = new Date().toISOString().slice(0, 10);
			const deadline = this.model.get(this.name);

			if (!deadline) return;

			let deadlineDayBefore = new Date(deadline);
			deadlineDayBefore.setTime(deadlineDayBefore.getTime() - 24 * 60 * 60 * 1000);
			deadlineDayBefore = deadlineDayBefore.toISOString().slice(0, 10);

			this.$el.removeClass('text-warning');
			this.$el.removeClass('text-danger');

			if (today == deadlineDayBefore) {
				this.$el.addClass('text-warning');
			}

			if (today >= deadline) {
				this.$el.addClass('text-danger');
			}
		}

		getFieldParamValue(fieldParam) {
			return this.getMetadata().get(['entityDefs', this.model.entityType, 'fields', this.name, fieldParam]);
		}
	};
});
