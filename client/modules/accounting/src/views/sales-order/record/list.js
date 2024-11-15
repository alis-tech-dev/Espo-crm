define(['views/record/list'], Dep => {
	return class extends Dep {
		setInvisible() {
			const currentUser = this.getUser();
			const portalId = currentUser.get('portalId');
			const accountId = currentUser.get('accountId');
			const type = currentUser.get('type');

			if (portalId && type === 'portal') {
				for (const model of this.collection.models) {
					const id = model.id;
					const modelAccountId = model.get('accountId');
					const row = document.querySelector(`tr[data-id="${id}"].list-row`);
					if (modelAccountId !== accountId && row) {
						row.hidden = true;
					}
				}
			}
		}

		afterRender() {
			this.setInvisible();
			super.afterRender();
		}
	};
});
