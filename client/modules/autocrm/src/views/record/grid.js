define(['views/record/list'], Dep => {
	return class GridView extends Dep {
		template = 'autocrm:record/grid';

		itemViewName = 'autocrm:views/record/grid-item';

		layoutName = 'grid';

		itemsPerRow = 4;

		setupHandlerType = 'record/grid';

		checkboxes = false;

		data() {
			return {
				...super.data(),
				itemsPerRow: this.itemsPerRow,
			};
		}

		setup() {
			super.setup();

			this.itemsPerRow = this.options.itemsPerRow || this.itemsPerRow;
		}

		buildRow(_, model, callback) {
			const key = model.id;

			this.rowList.push(key);

			const acl = {
				edit: this.getAcl().checkModel(model, 'edit') && !this.editDisabled,
				delete: this.getAcl().checkModel(model, 'delete') && !this.removeDisabled,
			};

			this.getInternalLayout(internalLayout => {
				const itemLayout = Espo.Utils.cloneDeep(internalLayout);

				this.createView(
					key,
					this.itemViewName,
					{
						model,
						acl,
						selector: '.grid-item[data-id="' + key + '"]',
						rowActionsDisabled: true,
						itemLayout,
					},
					callback,
				);
			});
		}

		/**
		 * @protected
		 */
		getInternalLayout(callback, model) {
			if (this.scope === null && !Array.isArray(this.listLayout)) {
				if (!model) {
					callback(null);

					return;
				}

				this.getInternalLayoutForModel(callback, model);

				return;
			}

			if (this.listLayout !== null) {
				callback(this.listLayout);

				return;
			}

			this._loadListLayout(listLayout => {
				this.listLayout = listLayout;

				callback(this.listLayout);
			});
		}
	};
});
