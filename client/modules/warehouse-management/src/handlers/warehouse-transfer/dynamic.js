define('warehouse-management:handlers/warehouse-transfer/dynamic', ['warehouse-management:handlers/goods-receipt/dynamic'], function (Dep) {
    return Dep.extend({

        finalStates: ['Transferred', 'Canceled'],

        onChangeWarehouseFromId: function () {
            this.controlItems();
        },

        controlItems: function () {
            if (this.model.get('warehouseFromId')) {
                this.recordView.setFieldNotReadOnly('items');
            } else {
                this.recordView.setFieldReadOnly('items');
            }
        }

    });
});
