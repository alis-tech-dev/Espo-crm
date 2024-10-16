define('warehouse-management:views/goods-issue/fields/items', ['warehouse-management:views/goods-receipt/fields/items'], function (Dep) {
    return Dep.extend({

        linkIconClass: 'fas fa-search',

        createDisabled: true,

        getSelectFilters: function () {
            return {
                parent: {
                    type: 'equals',
                    field: 'parentId',
                    value: this.model.get('warehouseId'),
                    data: {
                        type: 'is',
                        nameValue: this.model.get('warehouseName'),
                        typeValue: 'Warehouse',
                    }
                }
            };
        },

        processLinkedModelAttributes: function (attributes) {
            delete attributes.id;

            attributes.positionFromId = attributes.positionId;
            attributes.positionFromName = attributes.positionName;

            delete attributes.positionId;
            delete attributes.parentId;
            delete attributes.parentType;

            return attributes;
        },

    });
});
