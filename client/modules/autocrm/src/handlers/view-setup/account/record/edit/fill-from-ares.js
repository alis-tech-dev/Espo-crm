define(() => {
	return class {
		constructor(view) {
			this.view = view;
		}

		#getAction(provider) {
			return async function () {
				const sicCode = this.model.get('sicCode');

				if (!sicCode) {
					Espo.Ui.notify(this.translate('missingSicCode', 'messages', 'Account'), 'warning');
					return;
				}

				Espo.Ui.notify(' ... ');

				const response = await Espo.Ajax.getRequest(`${provider}/fill/${sicCode}`);

				for (const [key, value] of Object.entries(response.attributes)) {
					this.model.set(key, value);
					this.notify(false);
				}
			};
		}

		process() {
			if (this.view.getConfig().get('aresEnabled')) {
				this.view.buttonList.push({
					name: 'fillFromAres',
					label: this.view.translate('Ares', 'fillProviders', 'Account'),
				});

				this.view.actionFillFromAres = this.#getAction('Ares');
			}

			if (this.view.getConfig().get('finstatEnabled')) {
				this.view.buttonList.push({
					name: 'fillFromFinstat',
					label: this.view.translate('Finstat', 'fillProviders', 'Account'),
				});

				this.view.actionFillFromFinstat = this.#getAction('Finstat');
			}
		}
	};
});
