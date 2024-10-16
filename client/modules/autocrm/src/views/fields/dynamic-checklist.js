define('autocrm:views/fields/dynamic-checklist', ['views/fields/base'], function (Dep) {
	return Dep.extend({
		type: 'dynamic-checklist',

		listTemplate: 'autocrm:fields/dynamic-checklist/list',

		detailTemplate: 'autocrm:fields/dynamic-checklist/detail',

		editTemplate: 'autocrm:fields/dynamic-checklist/edit',

		searchTemplate: 'autocrm:fields/dynamic-checklist/search',

		searchTypeList: ['anyOf', 'noneOf', 'allOf', 'isEmpty', 'isNotEmpty'],

		MAX_ITEM_LENGTH: 100,

		maxItemLength: null,

		validations: ['required', 'maxCount'],

		events: {
			'click [data-action="removeValue"]': function (e) {
				const index = $(e.currentTarget).closest('.list-group-item').data('row-id');
				this.removeItem(index);
			},
		},

		data: function () {
			const itemHtmlList = [];

			(this.selected || []).forEach((item, index) => {
				itemHtmlList.push(this.getItemHtml(item, index));
			}, this);

			return _.extend(
				{
					selected: this.selected,
					itemHtmlList: itemHtmlList,
					isEmpty: (this.selected || []).length === 0,
					valueIsSet: this.model.has(this.name),
					maxItemLength: this.maxItemLength || this.MAX_ITEM_LENGTH,
				},
				Dep.prototype.data.call(this),
			);
		},

		setup: function () {
			Dep.prototype.setup.call(this);

			this.fetchFromModel();

			this.listenTo(this.model, 'change:' + this.name, this.fetchFromModel, this);
		},

		fetchFromModel: function () {
			this.selected = Espo.Utils.clone(this.model.get(this.name)) || [];
		},

		fetch: function () {
			this.fetchFromDom();
			return {
				[this.name]: this.selected,
			};
		},

		validateRequired: function () {
			if (this.isRequired()) {
				let value = this.model.get(this.name);

				if (!value || value.length === 0) {
					let msg = this.translate('fieldIsRequired', 'messages').replace('{field}', this.getLabelText());

					this.showValidationMessage(msg, '.array-control-container');

					return true;
				}
			}

			return false;
		},

		validateMaxCount: function () {
			if (this.params.maxCount) {
				let itemList = this.model.get(this.name) || [];

				if (itemList.length > this.params.maxCount) {
					let msg = this.translate('fieldExceedsMaxCount', 'messages')
						.replace('{field}', this.getLabelText())
						.replace('{maxCount}', this.params.maxCount.toString());

					this.showValidationMessage(msg, '.array-control-container');

					return true;
				}
			}

			return false;
		},

		getItemHtml: function (item, index) {
			index = _.isUndefined(index) ? this.selected.length - 1 : index; // undefined means new item is being added

			return $('<div>')
				.addClass('list-group-item')
				.attr('data-row-id', index)
				.append('&nbsp;')
				.append(
					$('<input>').attr('type', 'checkbox').addClass('form-checkbox').attr('checked', item.checked),

					$('<input>')
						.attr('type', 'text')
						.attr('value', item.label) // don't change to .val() because it doesn't work
						.addClass('main-element')
						.addClass('form-control'),

					$('<div>')
						.addClass('action-items')
						.append(
							$('<a>')
								.addClass('pull-right')
								.attr('data-action', 'removeValue')
								.append($('<span>').addClass('fas fa-trash-alt')),
						),
				)
				.get(0).outerHTML;
		},

		addValue: function (label) {
			const item = {
				checked: false,
				label: label,
			};

			this.selected.push(item);

			const html = this.getItemHtml(item);
			this.$list.append(html);

			this.trigger('change');
		},

		removeItem: function (index) {
			this.$list.children(`[data-row-id=${index}]`).remove();

			this.selected.splice(index, 1);

			this.trigger('change');
		},

		getValueForDisplay: function () {
			return $('<div>')
				.addClass('dynamic-checklist-field')
				.append(
					this.selected.map(item => {
						return $('<div>').append(
							$('<input>')
								.attr('type', 'checkbox')
								.addClass('form-checkbox')
								.attr('disabled', true)
								.attr('checked', item.checked),

							$('<span>').text(item.label),
						);
					}),
				)
				.get(0).outerHTML;
		},

		fetchFromDom: function () {
			const selected = [];
			this.$el.find('.list-group .list-group-item').each((_i, el) => {
				selected.push({
					checked: $(el).find('input:checkbox').is(':checked'),
					label: $(el).find('input:text').val(),
				});
			});

			this.selected = selected;
		},

		controlAddItemButton: function () {
			if (this.selected.length >= this.params.maxCount) {
				this.$addButton.addClass('disabled');
			}
		},

		afterRender: function () {
			if (this.mode === 'edit') {
				this.$list = this.$el.find('.list-group');

				const $addItemInput = (this.$addItemInput = this.$el.find('input.addItem'));

				this.$addButton = this.$el.find('button[data-action="addItem"]');

				this.$addButton.on('click', () => {
					const label = this.$addItemInput.val().toString();
					this.addValue(label);
					$addItemInput.val('');
				});

				$addItemInput.on('input', () => {
					this.controlAddItemButton();
				});

				// add the new item and updated the list if user presses 'Enter' or "Tab"
				$addItemInput.on('keypress', e => {
					if (e.keyCode === 13 || e.keyCode === 9) {
						let label = $addItemInput.val().toString();
						this.addValue(label);
						$addItemInput.val('');
						this.controlAddItemButton();
					}
				});

				this.controlAddItemButton();

				this.$list.sortable({
					stop: () => {
						this.fetchFromDom();
						this.trigger('change');
					},
				});
			}

			if (this.mode === 'search') {
				this.renderSearch();
			}

			// whenever any checkbox changes, update the item data-value and trigger the change event
			this.$el.find('input:checkbox').on('change', () => {
				this.fetchFromDom();
				this.trigger('change');
			});
		},
	});
});
