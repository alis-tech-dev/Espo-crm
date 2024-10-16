define(['views/fields/link'], Dep => {
	return class extends Dep {
		actionSelect() {
			Espo.Ui.notify(' ... ');

			this._getSelectFilters().then(filters => {
				const orderBy = filters.orderBy || this.panelDefs.selectOrderBy;
				const orderDirection = filters.orderBy
					? filters.order
					: this.panelDefs.selectOrderDirection;

				this.createView(
					'dialog',
					'views/modals/select-records',
					{
						scope: 'SalesOrderItem',
						createButton: false,
						filters: {
							salesOrder: {
								type: 'equals',
								attribute: 'salesOrderId',
								value: this.model.get('salesOrderId'),
								data: {
									type: 'is',
									idValue: this.model.get('salesOrderId'),
									nameValue: this.model.get('salesOrderName'),
								},
							},
						},
						forceSelectAllAttributes: ['name', 'productId'],
						filterList: this.getSelectFilterList(),
						createAttributesProvider: null,
						layoutName: this.panelDefs.selectLayout,
						orderBy: orderBy,
						orderDirection: orderDirection,
					},
					view => {
						view.render();

						Espo.Ui.notify(false);

						this.listenToOnce(view, 'select', model => {
							this.clearView('dialog');

							this.select(model);
						});
					},
				);
			});
		}

		select(model) {
			this.$elementName.val(model.get('name') || model.id);
			this.$elementId.val(model.get('productId'));

			if (this.mode === this.MODE_SEARCH) {
				this.searchData.idValue = model.get('productId');
				this.searchData.nameValue = model.get('name') || model.id;
			}

			this.trigger('change');

			this.controlCreateButtonVisibility();

			this.getSelectFieldHandler().then(handler => {
				handler.getAttributes(model).then(attributes => {
					this.model.set(attributes);
				});
			});
		}
	};
});
