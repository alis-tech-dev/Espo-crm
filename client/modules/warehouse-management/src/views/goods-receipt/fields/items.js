define("warehouse-management:views/goods-receipt/fields/items", [
    "autocrm:views/fields/link-multiple",
], function (Dep) {
    return Dep.extend({
        init: function () {
            Dep.prototype.init.call(this);

            this.listenTo(
                this.model,
                "change:warehouseType",
                this.determineLayout.bind(this, true)
            );

            this.determineLayout();
        },

        determineLayout: function (reRender) {
            const type = this.model.get("warehouseType"); //don't have to worry, always selected
            const scope = this.model.name;

            this.recordListLayout =
                this.getMetadata().get([
                    "warehouseTypes",
                    type,
                    "layouts",
                    scope,
                    this.name,
                ]) || "list" + scope + "Simple";

            if (reRender) {
                this.prepare().then(() => this.reRender());
            }
        },

        select: function (models) {
            console.log("select", models);

            Dep.prototype.select.call(this, models);
        },
    });
});

