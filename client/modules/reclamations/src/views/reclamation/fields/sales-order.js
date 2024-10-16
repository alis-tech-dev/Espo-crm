define(['views/fields/link'], Dep => {
	return class extends Dep {
		getSelectFilters() {
			return {
				productionOrders: {
					type: 'isLinked',
					data: {
						type: 'isNotEmpty',
					},
				},
			};
		}
	};
});
