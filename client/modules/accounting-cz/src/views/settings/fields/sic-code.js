define(['autocrm:views/account/fields/sic-code'], SicCodeFieldView => {
	return class extends SicCodeFieldView {
		process(data) {
			for (const [key, value] of Object.entries(data)) {
				this.model.set(
					'company' + Espo.Utils.upperCaseFirst(key),
					value,
				);
			}
		}
	};
});
