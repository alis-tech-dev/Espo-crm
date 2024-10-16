define('warehouse-management:handlers/goods-issue/dynamic', ['warehouse-management:handlers/goods-receipt/dynamic'], function (Dep) {
    return Dep.extend({

        finalStates: ['Issued', 'Canceled', 'Reserved'],

        init: function () {
            Dep.prototype.init.call(this);

            if (this.model.isNew()) {
                this.recordView.hideField('items');
            }
        },

        controlItems: function () {
            if (this.model.get('warehouseId')) {
                this.recordView.setFieldNotReadOnly('selectedItems');
            } else {
                this.recordView.setFieldReadOnly('selectedItems');
            }
        }

    });
});
