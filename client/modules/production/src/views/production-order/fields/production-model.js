define(['views/fields/link'], Dep => {
	return class extends Dep {
		getSelectFilters() {
			return {
				product: {
					type: 'linkedWith',
					attribute: 'product',
					value: this.model.get('productId'),
					data: {
						type: 'is',
						nameValue: this.model.get('productName'),
					},
				},
			};
		}
	};
});
