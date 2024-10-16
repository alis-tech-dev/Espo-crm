define("warehouse-management:handlers/supplier-order/create-xlsx", [
    "action-handler",
], function (Dep) {
    return Dep.extend({
        actionCreateXlsx: function (data, e) {
            const { scope } = this.view;

            this.view.notify("Loading...");
            this.view
                .ajaxGetRequest(scope + "/action/generateXlsx", {
                    id: this.view.model.id,
                })
                .then((response) => {
                    if (response.id) {
                        window.location =
                            this.view.getBasePath() +
                            "?entryPoint=download&id=" +
                            response.id;
                    }

                    this.view.notify(false);
                });
        },

        initCreateXlsx: function () {
            //  this.controlButtonVisibility();

            this.view.listenTo(
                this.view.model,
                "change:status",
                this.controlButtonVisibility.bind(this)
            );
        },

        controlButtonVisibility: function () {
            this.view.showHeaderActionItem("createXlsx");
        },
    });
});

