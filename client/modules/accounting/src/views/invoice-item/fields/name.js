define('accounting:views/invoice-item/fields/name', [
	'views/fields/varchar',
	'views/fields/link',
], function(Dep) {
	return Dep.extend({
		detailTemplate: 'accounting:invoice-item/fields/name/detail',
		listTemplate: 'accounting:invoice-item/fields/name/detail',
		editTemplate: 'accounting:invoice-item/fields/name/edit',

		productFieldMapping: {
			name: 'name',
			productId: 'id',
			productName: 'name',
			unitPrice: 'salesPrice',
			taxRate: 'taxRate',
		},

		events: _.extend(
			{
				'click [data-action="selectProduct"]': function() {
					this.notify('Loading...');
					const viewName =
						this.getMetadata().get([
							'clientDefs',
							'Product',
							'modalViews',
							'select',
						]) || 'views/modals/select-category-tree-records';

					this.createView(
						'dialog',
						viewName,
						{
							scope: 'Product',
							createButton: false,
							forceSelectAllAttributes: true,
						},
						function(view) {
							view.render();
							this.notify(false);

							this.listenToOnce(
								view,
								'select',
								function(model) {
									view.close();
									this.selectProduct(model);
								},
								this,
							);
						}.bind(this),
					);
				},
			},
			Dep.prototype.events,
		),

		data: function() {
			const data = Dep.prototype.data.call(this);
			const isProduct = !!this.model.get('productId');

			data.isProduct = isProduct;
			data.isNotProduct = !isProduct && this.model.get('name');
			data.productId = this.model.get('productId');

			return data;
		},

		setup: function() {
			Dep.prototype.setup.call(this);

			this.on('change', this.handleSelectProductVisibility, this);
			// console.log(Object.keys(this.model._events));
		},

		handleSelectProductVisibility: function() {
			if (!this.model.get('productId') && this.model.get('name')) {
				this.$el
					.find('[data-action="selectProduct"]')
					.addClass('disabled')
					.attr('disabled', 'disabled');
			} else {
				this.$el
					.find('[data-action="selectProduct"]')
					.removeClass('disabled')
					.removeAttr('disabled');
			}
		},

		afterRender: function() {
			Dep.prototype.afterRender.call(this);

			this.handleSelectProductVisibility();

			if (this.isEditMode() || this.isSearchMode()) {
				this.setupAutocomplete();
			}
		},

		setupAutocomplete: function() {
			this.$element.autocomplete(this.getAutocompleteOptions());
			this.$element.attr('autocomplete', 'espo-' + this.name);
			this.$element.off('focus.autocomplete');

			this.$element.on('focus', () => {
				if (this.$element.val()) {
					return;
				}

				this.$element.autocomplete('onFocus');
			});

			this.once('render', () => this.$element.autocomplete('dispose'));
			this.once('remove', () => this.$element.autocomplete('dispose'));
		},

		getAutocompleteOptions: function() {
			return {
				minChars: 1,
				lookup: null,
				autoSelectFirst: true,
				noCache: true,
				triggerSelectOnValidInput: false,
				beforeRender: $c => {
					if (this.$element.hasClass('input-sm')) {
						$c.addClass('small');
					}
				},
				formatResult: suggestion => {
					return this.getHelper().escapeString(suggestion.value);
				},
				lookupFilter: (suggestion, _query, queryLowerCase) => {
					if (
						suggestion.value
							.toLowerCase()
							.indexOf(queryLowerCase) === 0
					) {
						return (
							suggestion.value.length !== queryLowerCase.length
						);
					}

					return false;
				},
				onSelect: s => {
					this.getModelFactory().create('Product', model => {
						model.set(s.attributes);

						this.selectProduct(model);

						this.$element.focus();
					});
				},
				serviceUrl: q => this.getAutocompleteUrl(q),
				transformResult: response =>
					this.transformAutocompleteResult(response),
			};
		},

		getAutocompleteUrl: function(q) {
			const searchParams = this.getSearchParamsForAutocomplete(q);

			return 'Product?searchParams=' + JSON.stringify(searchParams);
		},

		getSearchParamsForAutocomplete: function(q) {
			return {
				maxSize: this.getConfig().get('recordsPerPage'),
				where: [
					{
						type: 'textFilter',
						value: q,
					},
				],
			};
		},

		selectProduct: function(model) {
			const setData = {};
			const allowedAttributes = new Set(
				this.getFieldManager().getEntityTypeAttributeList(
					this.model.name,
				),
			);

			Object.entries(this.productFieldMapping).forEach(
				([invoiceField, productField]) => {
					const value = model.get(productField);

					if (value && allowedAttributes.has(invoiceField)) {
						setData[invoiceField] = value;
					}
				},
			);

			this.model.set(setData);

			this.handleSelectProductVisibility();
			this.$element.prop('readonly', true);

			this.trigger('change');
		},
	});
});
