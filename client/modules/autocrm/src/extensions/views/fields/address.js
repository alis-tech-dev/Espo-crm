extend(['ui/select'], (Dep, Select) => {
	return class extends Dep {
		countryAsEnum = false;

		editTemplate = 'autocrm:fields/address/edit';
		editTemplate1 = 'autocrm:fields/address/edit-1';
		editTemplate2 = 'autocrm:fields/address/edit-2';
		editTemplate3 = 'autocrm:fields/address/edit-3';
		editTemplate4 = 'autocrm:fields/address/edit-4';

		init() {
			super.init();

			this.countryAsEnum = this.getConfig().get('addressCountryAsEnum') ?? false;
		}

		data() {
			const data = super.data();

			if (!this.countryAsEnum) {
				return data;
			} else {
				const countryOptions = Espo.Utils.clone(this.getConfig().get('addressCountryList') || []);

				countryOptions.push('');

				const countryValue = data.countryValue;

				const countryStyleMap = {};

				if (!countryOptions.includes(countryValue)) {
					countryStyleMap[countryValue] = 'danger';
				}

				return {
					...data,
					countryAsEnum: true,
					countryOptions: this.getConfig().get('addressCountryList') || [],
					countryTranslatedOptions: this.getLanguage().get('Settings', 'options', 'addressCountryList') || {},
					countryStyleMap,
				};
			}
		}

		afterRender() {
			super.afterRender();

			if (this.countryAsEnum) {
				if (this.$country) {
					Select.init(this.$country, { matchAnyWord: true });
				}
			}
		}

		getFormattedAddress1() {
			if (!this.countryAsEnum) {
				return super.getFormattedAddress1();
			} else {
				const postalCodeValue = this.model.get(this.postalCodeField);
				const streetValue = this.model.get(this.streetField);
				const cityValue = this.model.get(this.cityField);
				const stateValue = this.model.get(this.stateField);
				const countryValue = this.getLanguage().translateOption(
					this.model.get(this.countryField),
					'addressCountryList',
					'Settings',
				);

				let html = '';

				if (streetValue) {
					html += streetValue;
				}

				if (cityValue || stateValue || postalCodeValue) {
					if (html !== '') {
						html += '\n';
					}

					if (cityValue) {
						html += cityValue;
					}

					if (stateValue) {
						if (cityValue) {
							html += ', ';
						}
						html += stateValue;
					}

					if (postalCodeValue) {
						if (cityValue || stateValue) {
							html += ' ';
						}
						html += postalCodeValue;
					}
				}
				if (countryValue) {
					if (html !== '') {
						html += '\n';
					}

					html += countryValue;
				}

				return html;
			}
		}

		getFormattedAddress2() {
			if (!this.countryAsEnum) {
				return super.getFormattedAddress2();
			} else {
				const postalCodeValue = this.model.get(this.postalCodeField);
				const streetValue = this.model.get(this.streetField);
				const cityValue = this.model.get(this.cityField);
				const stateValue = this.model.get(this.stateField);
				const countryValue = this.getLanguage().translateOption(
					this.model.get(this.countryField),
					'addressCountryList',
					'Settings',
				);

				let html = '';

				if (streetValue) {
					html += streetValue;
				}

				if (cityValue || postalCodeValue) {
					if (html !== '') {
						html += '\n';
					}

					if (postalCodeValue) {
						html += postalCodeValue;

						if (cityValue) {
							html += ' ';
						}
					}

					if (cityValue) {
						html += cityValue;
					}
				}

				if (stateValue || countryValue) {
					if (html !== '') {
						html += '\n';
					}

					if (stateValue) {
						html += stateValue;

						if (countryValue) {
							html += ' ';
						}
					}

					if (countryValue) {
						html += countryValue;
					}
				}

				return html;
			}
		}

		getFormattedAddress3() {
			if (!this.countryAsEnum) {
				return super.getFormattedAddress3();
			} else {
				const postalCodeValue = this.model.get(this.postalCodeField);
				const streetValue = this.model.get(this.streetField);
				const cityValue = this.model.get(this.cityField);
				const stateValue = this.model.get(this.stateField);
				const countryValue = this.getLanguage().translateOption(
					this.model.get(this.countryField),
					'addressCountryList',
					'Settings',
				);

				let html = '';

				if (countryValue) {
					html += countryValue;
				}

				if (cityValue || stateValue || postalCodeValue) {
					if (html !== '') {
						html += '\n';
					}

					if (postalCodeValue) {
						html += postalCodeValue;
					}

					if (stateValue) {
						if (postalCodeValue) {
							html += ' ';
						}
						html += stateValue;
					}

					if (cityValue) {
						if (postalCodeValue || stateValue) {
							html += ' ';
						}
						html += cityValue;
					}
				}
				if (streetValue) {
					if (html !== '') {
						html += '\n';
					}

					html += streetValue;
				}

				return html;
			}
		}

		getFormattedAddress4() {
			if (!this.countryAsEnum) {
				return super.getFormattedAddress4();
			} else {
				const postalCodeValue = this.model.get(this.postalCodeField);
				const streetValue = this.model.get(this.streetField);
				const cityValue = this.model.get(this.cityField);
				const stateValue = this.model.get(this.stateField);
				const countryValue = this.getLanguage().translateOption(
					this.model.get(this.countryField),
					'addressCountryList',
					'Settings',
				);

				let html = '';

				if (streetValue) {
					html += streetValue;
				}

				if (cityValue) {
					if (html !== '') {
						html += '\n';
					}

					html += cityValue;
				}

				if (countryValue || stateValue || postalCodeValue) {
					if (html !== '') {
						html += '\n';
					}

					if (countryValue) {
						html += countryValue;
					}

					if (stateValue) {
						if (countryValue) {
							html += ' - ';
						}

						html += stateValue;
					}

					if (postalCodeValue) {
						if (countryValue || stateValue) {
							html += ' ';
						}

						html += postalCodeValue;
					}
				}

				return html;
			}
		}
	};
});
