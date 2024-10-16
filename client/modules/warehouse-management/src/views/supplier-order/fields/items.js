define(["autocrm:views/fields/link-multiple"], (Dep) => {
    return class extends Dep {
        editTemplate = "warehouse-management:supplier-order/fields/items/edit";

        setupEvents() {
            this.events['click [data-action="hintProducts"]'] = () => {
                const exceptIds = (this.model.get("itemsRecordList") || []).map(
                    (item) => item.productId
                );

                Espo.Ajax.getRequest("SupplierOrder/hintProducts", {
                    exceptIds,
                    accountId: this.model.get("accountId"),
                }).then((response) => {
                    const items = this.model.get("itemsRecordList") || [];

                    this.model.set(
                        "itemsRecordList",
                        items.concat(
                            response.map((product) => {
                                return {
                                    productId: product.id,
                                    name: product.name,
                                    quantity: product.minimumStockQuantity * 3,
                                };
                            })
                        )
                    );
                });
            };
            super.setupEvents();
        }
    };
});

