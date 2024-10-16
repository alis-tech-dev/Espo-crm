define(['views/fields/address'], AddressFieldView => {
	return class extends AddressFieldView {
		/* jshint ignore:start */
		showFillFromContact = true;
		showFillFromAccount = true;
		/* jshint ignore:end */

		afterRender() {
			super.afterRender();

			if (this.isEditMode()) {
				this.addFillFromLinks();
			} else {
				this.removeFillFromLinks();
			}
		}

		createFillFromLink(label, handler, scope = 'Global') {
			const $el = $('<a>')
				.attr('role', 'button')
				.attr('tabindex', '-1')
				.addClass('pull-right fill-from-link')
				.attr('title', this.translate(label, 'labels', scope))
				.text(this.translate(label, 'labels', scope));

			$el.on('click', handler);

			return $el;
		}

		addFillFromLinks() {
			const $cell = this.get$cell();

			if ($cell.find('.fill-from-link').length) {
				return;
			}

			const $fillFromLinks = [];

			if (this.showFillFromContact) {
				$fillFromLinks.push(
					this.createFillFromLink('Fill from Contact', () =>
						this.fillFromContact(),
					),
				);
			}

			if (this.showFillFromAccount) {
				$fillFromLinks.push(
					this.createFillFromLink('Fill from Account', () =>
						this.fillFromAccount(),
					),
				);
			}

			for (const $fillFromLink of $fillFromLinks)
				$cell.prepend($fillFromLink);
		}

		removeFillFromLinks() {
			const $cell = this.get$cell();
			$cell.find('.fill-from-link').remove();
		}

		async fillFromContact() {
			const { model, name } = this;

			const isShipping = name.startsWith('shipping');

			const billingContactId = model.get('billingContactId');
			const shippingContactId = model.get('shippingContactId');

			let contactId = isShipping ? shippingContactId : billingContactId;

			// fallback to the other contact
			if (!contactId) {
				contactId = billingContactId || shippingContactId;
			}

			// if no contact is set, do nothing
			if (!contactId) {
				Espo.Ui.warning(this.translate('Not found'));
				return;
			}

			const contact = await this.getModelFactory().create('Contact');
			contact.id = contactId;

			Espo.Ui.notify(' ... ');
			await contact.fetch();
			Espo.Ui.notify(false);

			model.set({
				[this.streetField]: contact.get('addressStreet'),
				[this.cityField]: contact.get('addressCity'),
				[this.stateField]: contact.get('addressState'),
				[this.countryField]: contact.get('addressCountry'),
				[this.postalCodeField]: contact.get('addressPostalCode'),
			});

			Espo.Ui.success(this.translate('Done'));
		}

		async fillFromAccount() {
			const { model } = this;

			const accountId = model.get('accountId');

			if (!accountId) {
				Espo.Ui.warning(this.translate('Not found'));
				return;
			}

			const account = await this.getModelFactory().create('Account');
			account.id = accountId;

			Espo.Ui.notify(' ... ');
			await account.fetch();
			Espo.Ui.notify(false);

			model.set({
				[this.streetField]: account.get(this.streetField),
				[this.cityField]: account.get(this.cityField),
				[this.stateField]: account.get(this.stateField),
				[this.countryField]: account.get(this.countryField),
				[this.postalCodeField]: account.get(this.postalCodeField),
			});

			Espo.Ui.success(this.translate('Done'));
		}
	};
});
