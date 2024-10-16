define(['autocrm:views/fields/link-multiple'], Dep => {
	return class extends Dep {
		processLinkedModelAttributes(attributes) {
			attributes.priceListPrice = attributes.costPrice;

			return attributes;
		}

		afterRender() {
			super.afterRender();

			this.$el.find('tr').each((i, el) => {
				//set tabindex

				$(el)
					.find('td[data-name="priceListPrice"] > div')
					.attr('tabindex', i);
			});
		}

		prepareRecordListViewOptions(options) {
			if (!this.isEditMode()) {
				options.checkboxes = false;
			}
		}
	};
});
