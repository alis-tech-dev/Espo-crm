define('accounting:handlers/invoice/discount', ['action-handler'], function (
	Dep,
) {
	return Dep.extend({
		checkVisibility: function () {
			return this.view.dropdownItemList.some(i => i.name === 'discount');
		},
		actionDiscount: function () {

			this.view.createView(
				'dialog',
				'accounting:views/invoice/modals/discount-dialog',
				{},
				view => {
					view.render();

					this.view.listenToOnce(view, 'done', response => {
						if (response.type === 'orderDiscount') {
							this.view.model.set('discount', null);
							this.view.model.set('discount', response.ammount);

							setTimeout(() => {
								Espo.Ajax.putRequest(
									'Invoice/' + this.view.model.get('id'),
									{
										itemsRecordList:
											this.view.model.get(
												'itemsRecordList',
											) || [],
										discount: response.ammount,
									},
								).then(response => {
									
								});
							}, 100);
						} else {
							let itemsRecordList = Espo.Utils.cloneDeep(
								this.view.model.get('itemsRecordList') || [],
							);
							itemsRecordList.forEach(item => {
								item.discount += response.ammount;
								item.amount = item.unitPrice * item.quantity;
								item.amount -=
									item.amount * (item.discount / 100);
								item.amountWithTax =
									item.amount * (1 + item.taxRate / 100);
								item.taxAmount =
									item.amountWithTax - item.amount;
							});
							setTimeout(() => {
								this.view.model.set(
									'itemsRecordList',
									itemsRecordList,
								);
							}, 0);

							Espo.Ajax.putRequest(
								'Invoice/' + this.view.model.get('id'),
								{
									itemsRecordList: itemsRecordList,
								},
							);
						}
					});
				},
			);
		},
	});
});
