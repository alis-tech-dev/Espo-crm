define('warehouse-management:views/warehouse-item/fields/position-from', ['views/fields/link'], function (Dep) {
    return Dep.extend({
        createDisabled: true,

        warehouseField: 'warehouse',

        transferWarehouseField: 'warehouseFrom',

        parentModel: null,

        setup: function () {
            this.parentModel = (this.model.collection || {}).parentModel || null;

            if (this.parentModel && this.parentModel.name === 'WarehouseTransfer') {
                this.warehouseField = this.transferWarehouseField;
            }

            Dep.prototype.setup.call(this);
        },

        getSelectFilters: function () {
            if (!this.parentModel) {
                return null;
            }

            const id = this.parentModel.get(this.warehouseField + 'Id');

            if (!id) {
                return null;
            }

            return {
                warehouse: {
                    type: 'equals',
                    field: 'warehouseId',
                    value: id,
                    data: {
                        type: 'is',
                        nameValue: this.parentModel.get(this.warehouseField + 'Name'),
                    }
                }
            };
        }
    });
});
