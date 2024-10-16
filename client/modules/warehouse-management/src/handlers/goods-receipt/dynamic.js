define('warehouse-management:handlers/goods-receipt/dynamic', ['dynamic-handler'], function (Dep) {
    return Dep.extend({

        finalStates: ['Received', 'Canceled'],

        init: function () {
            this.controlEverything();
            this.controlItems();
        },

        onChangeWarehouseId: function () {
            this.controlItems();
        },

        onChangeStatus: function () {
            this.controlEverything();
        },

        controlEverything: function () {
            if (this.finalStates.includes(this.model.get('status'))) {
                this.recordView.setReadOnly();
            } else {
                this.recordView.setNotReadOnly();
            }
        },

        controlItems: function () {
            if (this.model.get('warehouseId')) {
                this.recordView.setFieldNotReadOnly('items');
            } else {
                this.recordView.setFieldReadOnly('items');
            }
        }

    });
});
