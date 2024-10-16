define("warehouse-management:handlers/goods-issue/revert-goods-issue-action", [
    "action-handler",
], function (Dep) {
    return Dep.extend({
        attributeMapping: {
            warehouseId: "warehouseId",
            warehouseType: "warehouseType",
            warehouseName: "warehouseName",
        },

        checkVisibility: function () {
            return this.view.model.get("status") === "Issued";
        },

        actionRevertGoodsIssue: function () {
            const { model } = this.view;

            const options = {
                attributes: {
                    name: this.view
                        .getLanguage()
                        .translate("reversionName", "messages", "GoodsIssue")
                        .replace("%s", model.get("name")),
                },
                returnUrl: this.view.getRouter().getCurrentUrl(),
                returnDispatchParams: {
                    controller: this.view.scope,
                    action: null,
                    options: {
                        isReturn: true,
                    },
                },
            };

            for (const [key, value] of Object.entries(this.attributeMapping)) {
                options.attributes[key] = model.get(value);
            }

            options.attributes.itemsRecordList = model
                .get("itemsRecordList")
                .map((item) => {
                    if ("positionFromId" in item) {
                        item.positionToId = item.positionFromId;
                        item.positionToName = item.positionFromName;

                        delete item.positionFromId;
                        delete item.positionFromName;
                    }

                    return item;
                });

            this.view
                .getRouter()
                .navigate("GoodsReceipt/create", { trigger: false });
            this.view.getRouter().dispatch("GoodsReceipt", "create", options);
        },
    });
});

