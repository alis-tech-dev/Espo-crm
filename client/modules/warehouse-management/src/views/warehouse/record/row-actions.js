define("warehouse-management:views/warehouse/record/row-actions", [
    "views/record/row-actions/relationship-view-only",
], function (Dep) {
    return Dep.extend({
        getActionList: function () {
            const list = Dep.prototype.getActionList.call(this);
            const warehosueQuantity = this.model.get("warehouseQuantity") || 0;
            const replenishmentQuantity =
                this.model.get("replenishmentQuantity") || 0;
            const quantity = Math.max(
                replenishmentQuantity - warehosueQuantity,
                1
            );

            if (this.model.get("type") === "Product") {
                list.push({
                    action: "produce",
                    label: "Produce",
                    data: {
                        id: this.model.id,
                        name: this.model.get("name"),
                        quantity: quantity,
                        unit: this.model.get("unit"),
                    },
                    link: "#Production/create",
                });
            } else {
                list.push({
                    action: "order",
                    label: "Naskladnit",
                    data: {
                        id: this.model.id,
                        name: this.model.get("name"),
                        quantity: quantity,
                        unit: this.model.get("unit"),
                    },
                    link: "#GoodsReceipt/create",
                });
            }

            return list;
        },
    });
});

