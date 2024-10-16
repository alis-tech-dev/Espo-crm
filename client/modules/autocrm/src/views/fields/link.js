define(['views/fields/link'], Dep => {
	return class extends Dep {
		getSelectFilters() {
			return this.params.defaultSelectFilters || {};
		}
	};
});
