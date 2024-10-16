define(['views/modal'], Dep => {
	return class extends Dep {
		template = 'quote-conversion:views/quote/modals/convert-to-sales-order';

		buttonList = [
			{
				name: 'select',
				label: 'Select',
				style: 'primary',
			},
			{
				name: 'cancel',
				label: 'Cancel',
				title: 'Esc',
			},
		];

		setup() {
			this.headerText = this.translate(
				'Select Sales Order Items',
				'labels',
				'Quote',
			);

			this.entriesData = this.options.entriesData;
			this.itemsRecordList = this.options.itemsRecordList;

			if (!this.entriesData) {
				throw new Error('entriesData is required');
			}

			if (!this.itemsRecordList) {
				throw new Error('itemsRecordList is required');
			}

			this.entries = this.processData();
		}

		afterRender() {
			this.$el.find('.entry-checkbox').on('change', ({ target }) => {
				$(target)
					.closest('.entry')
					.find('.entry-item-checkbox:not(:disabled)')
					.prop('checked', target.checked);
			});

			this.$el.find('.entry-item-checkbox:not(:disabled)').on('change', ({ target }) => {
				const $entry = $(target).closest('.entry');
				const $entryItems = $entry.find('.entry-item-checkbox:not(:disabled)');
				const $entryCheckbox = $entry.find('.entry-checkbox');

				$entryCheckbox.prop(
					'checked',
					$entryItems.filter(':checked').length ===
						$entryItems.length,
				);
			});
		}

		processData() {
			const entries = [];
			const entryKeyMap = new Map();

			for (const item of this.itemsRecordList) {
				entryKeyMap.set(item.entryKey, item);
			}

			for (const { description, ids } of this.entriesData) {
				const index = entries.length;
				const id = `entry-${index}`;
				const items = [];

				for (const id of ids) {
					const item = entryKeyMap.get(id);

					if (item) {
						items.push(item);
					}
				}

				if (items.length > 0) {
					entries.push({ index, id, description, items });
				}
			}

			return entries;
		}

		data() {
			return { entries: this.entries };
		}

		async actionSelect() {
			const idItemMap = new Map();

			for (const item of this.itemsRecordList) {
				idItemMap.set(item.id, item);
			}

			const checkedIds = this.$el
				.find('.entry-item-checkbox:checked')
				.map((_, el) => el.id)
				.toArray();

			const selectedItems = checkedIds.map(id => idItemMap.get(id));

			const entryKeys = selectedItems.map(({ entryKey }) => entryKey);

			const entryData = this.entriesData.filter(({ ids }) =>
				ids.some(id => entryKeys.includes(id)),
			);

			this.trigger('selected', [selectedItems, entryData]);
		}
	};
});
