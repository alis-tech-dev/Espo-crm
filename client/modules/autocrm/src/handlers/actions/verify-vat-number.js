define(['action-handler'], ActionHandler => {
	return class extends ActionHandler {
		async actionVerifyVatNumber() {
			const { model } = this.view;

			const vatId = model.get('vatId');

			const countryCode = vatId.substring(0, 2);
			const vatNumber = vatId.substring(2);

			if (countryCode.length !== 2 || vatNumber.length === 0) {
				Espo.Ui.error(this.view.translate('vatIdInvalidformat', 'messages', 'Account'));
				return;
			}

			if (!/^[a-zA-Z]{2}$/.test(countryCode)) {
				Espo.Ui.error(this.view.translate('vatIdInvalidformat', 'messages', 'Account'));
				return;
			}

			const url = `Vies/verifyVatNumber/${countryCode}/${vatNumber}`;

			Espo.Ui.notify(' ... ');

			const { valid } = (await Espo.Ajax.getRequest(url)) || {};

			if (valid === true) {
				Espo.Ui.success(this.view.translate('vatNumberIsValid', 'messages', 'Account'));
			} else if (valid === false) {
				Espo.Ui.error(this.view.translate('vatNumberIsInvalid', 'messages', 'Account'));
			} else {
				Espo.Ui.error(this.view.translate('vatVerificationFailed', 'messages', 'Account'));
			}
		}

		visible() {
			if (!this.view.getConfig().get('viesEnabled')) {
				return false;
			}

			const { model } = this.view;
			const vatId = model.get('vatId');
			return vatId && vatId.length > 0;
		}
	};
});
