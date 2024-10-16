define(['views/record/kanban'], Dep => {
	return class extends Dep {
		setup() {
			this.entityType = this.collection.entityType || null;
			this.scope = this.options.scope || this.entityType;

			const statusField = 'productionStatus';
			const statusIgnoreList =
				this.getMetadata().get([
					'entityDefs',
					this.scope,
					'fields',
					statusField,
					'kanbanOptionsIgnoreList',
				]) || [];

			Object.defineProperty(this, 'statusField', {
				get: () => statusField,
				set: () => {},
			});

			const statusList = Espo.Utils.clone(
				this.getMetadata().get([
					'entityDefs',
					this.scope,
					'fields',
					statusField,
					'options',
				]),
			).filter(item => {
				return statusIgnoreList.includes(item);
			});

			Object.defineProperty(this, 'statusList', {
				get: () => statusList,
				set: () => {},
			});

			super.setup();
		}

		storeGroupOrder(group, id) {
			let ids = this.getGroupOrderFromDom(group);

			if (id) {
				ids.unshift(id);
			}

			return Espo.Ajax.putRequest('CustomKanban/order', {
				entityType: this.entityType,
				group: group,
				ids: ids,
			});
		}
	};
});
