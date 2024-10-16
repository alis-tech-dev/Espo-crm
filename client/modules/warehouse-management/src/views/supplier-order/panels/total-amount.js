define("warehouse-management:views/supplier-order/panels/total-amount", [
    "views/record/panels/side",
], function (Dep) {
    return Dep.extend({
        templateContent:
            '<div><span style="font-size: 20px">{{viewObject.totalAmount}}</span></div>',

        setup: function () {
            this.ajaxGetRequest("SupplierOrder/action/getTotalAmount", {
                id: this.model.id,
            }).then((response) => {
                this.totalAmount = response.totalAmount;

                this.reRender();
            });
        },
    });
});

