define(['warehouse-management:views/goods-receipt/fields/items'], Dep => {
	return class extends Dep {
		select(models) {
			models.forEach(model => {
				this.addLink(model.id, model.get('productName'));
			});
		}
	};
});
