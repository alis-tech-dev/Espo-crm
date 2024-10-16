define('warehouse-management:views/warehouse-item/fields/position-to', ['warehouse-management:views/warehouse-item/fields/position-from'], function (Dep) {
    return Dep.extend({
        transferWarehouseField: 'warehouseTo',
    });
});
