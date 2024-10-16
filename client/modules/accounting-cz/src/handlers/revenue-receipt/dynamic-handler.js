define('accounting-cz:handlers/revenue-receipt/dynamic-handler', [
	'dynamic-handler',
], function (Dep) {
	return Dep.extend({
		init: function () {
			Dep.prototype.init.call(this);

			if (this.model.isNew()) {
				if (!this.model.get('skipFillDefaultValues')) {
					this.fillDefaultValues();
				}
			}
		},

		onChangeSubscriberLinkId: function () {
			this.fillSubscriberData();
		},

		fillSubscriberData: function () {
			if (this.model.get('subscriberLinkId')) {
				const linkType = this.model.get('subscriberLinkType');
				const linkId = this.model.get('subscriberLinkId');

				this.recordView.getModelFactory().create(linkType, model => {
					model.id = linkId;

					model.fetch().then(() => {
						let contactName = '';

						if (linkType === 'Contact') {
							let contactDegree = model.get('degree');

							if (contactDegree) {
								contactName += contactDegree + ' ';
							}

							contactName +=
								model.get('firstName') +
								' ' +
								model.get('lastName');

							this.model.set('subscriberName', contactName);
							this.model.set(
								'subscriberShippingStreet',
								model.get('shippingAddressStreet') || null,
							);
							this.model.set(
								'subscriberShippingCity',
								model.get('shippingAddressCity') || null,
							);
							this.model.set(
								'subscriberShippingState',
								model.get('shippingAddressState') || null,
							);
							this.model.set(
								'subscriberShippingCountry',
								model.get('shippingAddressCountry') || null,
							);
							this.model.set(
								'subscriberShippingPostalCode',
								model.get('shippingAddressPostalCode') || null,
							);

							this.model.set(
								'subscriberBillingAddressStreet',
								model.get('addressStreet'),
							);
							this.model.set(
								'subscriberBillingAddressCity',
								model.get('addressCity'),
							);
							this.model.set(
								'subscriberBillingAddressState',
								model.get('addressState'),
							);
							this.model.set(
								'subscriberBillingAddressCountry',
								model.get('addressCountry'),
							);
							this.model.set(
								'subscriberBillingAddressPostalCode',
								model.get('addressPostalCode'),
							);
						} else {
							contactName = model.get('name');

							this.model.set(
								'subscriberBillingAddressStreet',
								model.get('billingAddressStreet'),
							);
							this.model.set(
								'subscriberBillingAddressCity',
								model.get('billingAddressCity'),
							);
							this.model.set(
								'subscriberBillingAddressState',
								model.get('billingAddressState'),
							);
							this.model.set(
								'subscriberBillingAddressCountry',
								model.get('billingAddressCountry'),
							);
							this.model.set(
								'subscriberBillingAddressPostalCode',
								model.get('billingAddressPostalCode'),
							);

							this.model.set(
								'subscriberShippingAddressStreet',
								model.get('shippingAddressStreet'),
							);
							this.model.set(
								'subscriberShippingAddressCity',
								model.get('shippingAddressCity'),
							);
							this.model.set(
								'subscriberShippingAddressState',
								model.get('shippingAddressState'),
							);
							this.model.set(
								'subscriberShippingAddressCountry',
								model.get('shippingAddressCountry'),
							);
							this.model.set(
								'subscriberShippingAddressPostalCode',
								model.get('shippingAddressPostalCode'),
							);
						}

						this.model.set('subscriberName', contactName);

						this.model.set(
							'subscriberSicCode',
							model.get('sicCode'),
						);
						this.model.set('subscriberVatId', model.get('vatId'));

						console.log(model);
					});
				});
			} else {
				this.clearSubscriberData();
			}
		},

		clearSubscriberData: function () {
			this.model.set('subscriberName', null);
			this.model.set('subscriberBillingAddressStreet', null);
			this.model.set('subscriberBillingAddressCity', null);
			this.model.set('subscriberBillingAddressState', null);
			this.model.set('subscriberBillingAddressCountry', null);
			this.model.set('subscriberBillingAddressPostalCode', null);

			this.model.set('subscriberShippingAddressStreet', null);
			this.model.set('subscriberShippingAddressCity', null);
			this.model.set('subscriberShippingAddressState', null);
			this.model.set('subscriberShippingAddressCountry', null);
			this.model.set('subscriberShippingAddressPostalCode', null);

			this.model.set('subscriberSicCode', null);
			this.model.set('subscriberVatId', null);
		},

		fillDefaultValues: function () {
			const config = this.recordView.getConfig();

			this.model.set('supplierName', config.get('supplierName'));
			this.model.set(
				'supplierAddressCity',
				config.get('supplierAddressCity'),
			);
			this.model.set(
				'supplierAddressCountry',
				config.get('supplierAddressCountry'),
			);
			this.model.set(
				'supplierAddressPostalCode',
				config.get('supplierAddressPostalCode'),
			);
			this.model.set(
				'supplierAddressState',
				config.get('supplierAddressState'),
			);
			this.model.set(
				'supplierAddressStreet',
				config.get('supplierAddressStreet'),
			);
			this.model.set('supplierSicCode', config.get('supplierSicCode'));
			this.model.set('supplierVatId', config.get('supplierVatId'));
			this.model.set('supplierEmail', config.get('supplierEmail'));
			this.model.set('supplierPhone', config.get('supplierPhone'));
			this.model.set('supplierWebsite', config.get('supplierWebsite'));
		},
	});
});
