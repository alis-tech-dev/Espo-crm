define('warehouse-management:views/warehouse-transfer/fields/items', ['autocrm:views/fields/link-multiple'], function (Dep) {
    return Dep.extend({

        linkIconClass: 'fas fa-search',

        createDisabled: true,

        forceSelectAllAttributes: true,

        init: function () {
            Dep.prototype.init.call(this);

            this.listenTo(this.model, 'change:warehouseFromType', this.determineLayout.bind(this, true));
            this.listenTo(this.model, 'change:warehouseToType', this.determineLayout.bind(this, true));

            this.determineLayout();
        },

        determineLayout: function (reRender) {
            const typeFrom = this.model.get('warehouseFromType');
            const typeTo = this.model.get('warehouseToType');

            this.recordListLayout = this.getMetadata().get([
                'warehouseTypes',
                typeFrom,
                'layouts',
                'WarehouseTransfer',
                'items',
                typeTo
            ]) || 'listWarehouseTransferSimpleSimple';

            if (reRender) {
                this.prepare().then(() => this.reRender());
            }
        },

        getSelectFilters: function () {
            return {
                parent: {
                    type: 'equals',
                    field: 'parentId',
                    value: this.model.get('warehouseFromId'),
                    data: {
                        type: 'is',
                        nameValue: this.model.get('warehouseFromName'),
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
