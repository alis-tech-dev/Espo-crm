define(['views/fields/multi-enum'], Dep => {
	return class extends Dep {
		setupOptions() {
			if (this.getConfig().get('addressCountryAsEnum') ?? false) {
				this.params.options = this.getConfig().get('addressCountryListOptions') || [];

				this.translatedOptions = this.getLanguage().get('Settings', 'options', 'addressCountryList') || {};
			}
		}
	};
});
