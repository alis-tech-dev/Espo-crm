define('warehouse-management:handlers/goods-issue/create-goods-receipt-action', ['action-handler'], function (Dep) {
    return Dep.extend({

		init: function () {
            this.checkVisibility();
            this.view.listenTo(this.view.model, 'change:status', () => this.checkVisibility());
        },

        checkVisibility: function () {
			if (this.view.model.get('status') !== 'Issued') {
                this.view.hideHeaderActionItem('createGoodsReceipt');
            } else {
                this.view.showHeaderActionItem('createGoodsReceipt');
            }
        },

        actionCreateGoodsReceipt: function () {
            const { view } = this;

			const options = {
				attributes: view.model.attributes,
			};

			delete options.attributes.id;
			delete options.attributes.status;
			delete options.attributes.itemsIds;
			delete options.attributes.itemsNames;
			delete options.attributes.modifiedById;
			delete options.attributes.modifiedByName;
			delete options.attributes.modifiedAt;
			delete options.attributes.createdAt;
			delete options.attributes.createdById;
			delete options.attributes.createdByName;
			delete options.attributes.assignedUser;

			options.attributes.itemsRecordList.forEach(item => {
				item.positionToId = item.positionFromId;
				item.positionToName = item.positionFromName;
				delete item.id;
			});

			const returnDispatchParams = {
				controller: view.scope,
				action: null,
				options: {
					isReturn: true,
				},
			};

			_.extend(options, {
				returnUrl: view.getRouter().getCurrentUrl(),
				returnDispatchParams: returnDispatchParams,
			});

			view.getRouter().navigate('GoodsReceipt/create', { trigger: false });
			view.getRouter().dispatch('GoodsReceipt', 'create', options);
        },
    });
});
