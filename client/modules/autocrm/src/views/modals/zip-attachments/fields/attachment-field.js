define(['views/fields/enum'], Dep => {
	return class extends Dep {
		setup() {
			super.setup();

			this.setupOptions();
		}

		setupOptions() {
			const entityType = this.options.entityType;

			const fields = this.getMetadata().get(['entityDefs', entityType, 'fields']) || {};
			this.params.options = Object.keys(fields).filter(
				fieldName => fields[fieldName].type === 'attachmentMultiple' || fields[fieldName].type === 'file',
			);

			if (this.params.options.length > 0) {
				this.model.set(this.name, this.params.options[0]);
			}

			// Translate field names
			this.translatedOptions = {};

			this.params.options.forEach(option => {
				this.translatedOptions[option] = this.translate(option, 'fields', entityType);
			});
		}

		fetch() {
			const data = super.fetch();

			if (data[this.name] === '') {
				data[this.name] = null;
			}

			return data;
		}
	};
});
