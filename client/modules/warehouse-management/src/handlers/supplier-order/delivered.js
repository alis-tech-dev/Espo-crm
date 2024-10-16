define("warehouse-management:handlers/supplier-order/delivered", [
    "action-handler",
], function (Dep) {
    return Dep.extend({
        actionDelivered: function () {
            Espo.Ui.notify("...");

            this.view.model
                .save({ status: "Delivered" }, { patch: true })
                .then(() => {
                    Espo.Ui.success();
                });
        },

        controlVisibility: function () {
            if (this.view.model.get("status") === "Delivered") {
                this.view.hideHeaderActionItem("delivered");
            } else {
                this.view.hideHeaderActionItem("delivered");
            }
        },

        init: function () {
            this.controlVisibility();

            this.view.listenTo(
                this.view.model,
                "change:status",
                this.controlVisibility.bind(this)
            );
        },
    });
});

