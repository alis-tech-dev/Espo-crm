define(['views/fields/link-multiple-with-primary'], Dep => {
	return class extends Dep {
		recolorRows() {
			console.log('model; ', this.model)
			const isInvisible = this.model.get('isInvisible');
			const id = this.model.id;
			if (isInvisible === true) {
				const row = document.querySelector(`tr[data-id="${id}"].list-row`);
				if (row) {
					row.hidden = true;
				}
			}
		}

		afterRender() {
			this.recolorRows();
			super.afterRender();
		}
	};
});