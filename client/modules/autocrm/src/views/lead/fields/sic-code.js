define(['autocrm:views/account/fields/sic-code'], SicCodeFieldView => {
	return class extends SicCodeFieldView {
		process(data) {
			for (const [key, value] of Object.entries(data)) {
				if (key === 'name') {
					this.model.set('accountName', value);
					continue;
				}

				this.model.set(Espo.Utils.lowerCaseFirst(key.replace('billing', '')), value);
			}
		}
	};
});
