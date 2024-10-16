extend(Dep => {
	return class extends Dep {
		recolorRows() {
			for (const model of this.collection.models) {
				const $row = this.$el.find(`tr[data-id="${model.id}"]`);

				let color = null;

				switch (model.get('status')) {
					case 'Returned':
						//red
						color = '#ffcccc';
						break;
					case 'OnHold':
						//orange
						color = '#ffddcc';
						break;
				}

				if (color) {
					$row.css({
						background: color,
					});
				}
			}
		}

		afterRender() {
			this.recolorRows();
			super.afterRender();
		}
	};
});
