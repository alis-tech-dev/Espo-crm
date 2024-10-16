define('warehouse-management:handlers/goods-receipt/create-warehouse-transfer-action', ['action-handler'], function (Dep) {
    return Dep.extend({
        attributeMapping: {
            name: 'name',
            warehouseFromId: 'warehouseId',
            warehouseFromType: 'warehouseType',
            warehouseFromName: 'warehouseName',
            warehouseToId: 'warehouseId',
            warehouseToType: 'warehouseType',
            warehouseToName: 'warehouseName',
        },

        checkVisibility: function () {
            return this.view.model.get('status') === 'Received';
        },

        actionCreateWarehouseTransfer: function () {
            const {model} = this.view;

            const options = {
                attributes: {},
                returnUrl: this.view.getRouter().getCurrentUrl(),
                returnDispatchParams: {
                    controller: this.view.scope,
                    action: null,
                    options: {
                        isReturn: true
                    }
                }
            };

            for (const [key, value] of Object.entries(this.attributeMapping)) {
                options.attributes[key] = model.get(value);
            }

            options.attributes.itemsRecordList = model.get('itemsRecordList').map(item => {
                if ('positionToId' in item) {
                    item.positionFromId = item.positionToId;
                    item.positionFromName = item.positionToName;

                    delete item.positionToId;
                    delete item.positionToName;
                }

                return item;
            });

            this.view.getRouter().navigate('WarehouseTransfer/create', {trigger: false});
            this.view.getRouter().dispatch('WarehouseTransfer', 'create', options);
        },
    });
});
