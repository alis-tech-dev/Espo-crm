define(["autocrm:views/dashlets/record-list"], function (Dep) {
    return Dep.extend({
        rowActionsView:
            "warehouse-management:views/warehouse/record/row-actions",

        setup: function () {
            this.scope = "Product";

            Dep.prototype.setup.call(this);

            this.warehouseId = this.getOption("warehouseId");

            this.collectionUrl =
                "Warehouse/products?" +
                $.param({ warehouseId: this.warehouseId });
            this.optionsData.layout = "listRunningOut";
        },
    });
});

