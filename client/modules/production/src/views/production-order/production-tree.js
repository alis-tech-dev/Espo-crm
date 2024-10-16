define(['views/record/list-tree'], Dep => {
	return class extends Dep {
		createDisabled = true;
		itemViewName = 'production:views/production-order/production-tree-item';
	};
});
