define(['views/fields/link'], Dep => {
	return class extends Dep {
		getSelectFilters() {
			const parentModel = this.options.dataObject.parentModel;
			const id = parentModel.get('id');
			const name = parentModel.get('name');

			return {
				parent: {
					type: 'and',
					value: [
						{
							type: 'equals',
							attribute: 'parentId',
							value: id,
						},
						{
							type: 'equals',
							attribute: 'parentType',
							value: 'ProductionOrder',
						},
					],
					data: {
						type: 'is',
						idValue: id,
						nameValue: name,
						typeValue: 'ProductionOrder',
					},
				},
			};
		}
	};
});
