define(["action-handler"], (Dep) => {
    return class extends Dep {
        actionCreateGoodsIssue() {
            this.view.createView(
                "dialog",
                "views/modals/select-records",
                {
                    scope: "WarehouseItem",
                    multiple: true,
                    filters: {
                        parent: {
                            type: "and",
                            attribute: "parentId",
                            value: [
                                {
                                    type: "equals",
                                    field: "parentId",
                                    value: this.view.model.get("id"),
                                },
                                {
                                    type: "equals",
                                    field: "parentType",
                                    value: "GoodsReceipt",
                                },
                            ],
                            data: {
                                type: "is",
                                idValue: this.view.model.get("id"),
                                nameValue: this.view.model.get("name"),
                                typeValue: "GoodsReceipt",
                            },
                        },
                    },
                },
                (view) => {
                    this.view.listenTo(view, "select", (models) => {
                        const options = {
                            attributes: {
                                warehouseId: this.view.model.get("warehouseId"),
                                warehouseName:
                                    this.view.model.get("warehouseName"),

                                parentId: this.view.model.get("id"),
                                parentType: "GoodsReceipt",
                                parentName: this.view.model.get("name"),

                                selectedItemsRecordList: models.map(
                                    (model) => ({
                                        quantity: model.get("quantity"),
                                        productId: model.get("productId"),
                                        productName: model.get("productName"),
                                    })
                                ),
                            },
                        };

                        let returnDispatchParams = {
                            controller: this.view.scope,
                            action: null,
                            options: {
                                isReturn: true,
                            },
                        };

                        _.extend(options, {
                            returnUrl: this.view.getRouter().getCurrentUrl(),
                            returnDispatchParams: returnDispatchParams,
                        });

                        this.view.getRouter().navigate("GoodsIssue/create", {
                            trigger: false,
                        });
                        this.view
                            .getRouter()
                            .dispatch("GoodsIssue", "create", options);
                    });

                    view.render();
                }
            );
        }

        init() {}
    };
});

