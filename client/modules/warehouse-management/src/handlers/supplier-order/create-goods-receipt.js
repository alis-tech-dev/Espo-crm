define(
    "warehouse-management:handlers/supplier-order/create-goods-receipt",
    "action-handler",
    function (Dep) {
        return Dep.extend({
            actionCreateGoodsReceipt: function () {
                const options = {
                    attributes: this.view.model.attributes,
                };

                options.attributes.itemsRecordList.forEach(function (item) {
                    delete item.id;

                    item.productName = item.name;
                });

                options.attributes.supplierOrderId = options.attributes.id;
                options.attributes.supplierOrderName = options.attributes.name;

                delete options.attributes.id;
                delete options.attributes.itemsNames;
                delete options.attributes.itemsIds;
                delete options.attributes.status;

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

                this.view
                    .getRouter()
                    .navigate("GoodsReceipt/create", { trigger: false });
                this.view
                    .getRouter()
                    .dispatch("GoodsReceipt", "create", options);
            },

            initCreateGoodsReceipt: function () {
                this.controlButtonVisibility();

                this.view.listenTo(
                    this.view.model,
                    "change:status",
                    this.controlButtonVisibility.bind(this)
                );

                this.view.listenTo(
                    this.view.model,
                    "change:goodsReceiptId",
                    this.controlButtonVisibility.bind(this)
                );
            },

            controlButtonVisibility: function () {
                if (
                    ~["order", "received"].indexOf(
                        this.view.model.get("status")
                    )
                ) {
                    if (this.view.model.get("goodsReceiptId")) {
                        this.view.hideHeaderActionItem("createGoodsReceipt");
                    } else {
                        this.view.showHeaderActionItem("createGoodsReceipt");
                    }
                } else {
                    this.view.hideHeaderActionItem("createGoodsReceipt");
                }
            },
        });
    }
);

