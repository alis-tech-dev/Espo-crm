define(["views/fields/base"], (Dep) => {
    return Dep.extend({
        templateContent:
            '<button class="btn btn-default" data-action="order"></button>',

        inlineEditDisabled: true,

        events: {
            'click [data-action="order"]': function () {
                this.actionOrder();
            },
        },

        setup: function () {
            Dep.prototype.setup.call(this);

            this.orderedValue = this.model.get(this.name);

            this.listenTo(this.model, "change:" + this.name, () => {
                this.notify("Loading...");
                this.model.save().then(() => this.notify(false));
            });
        },

        afterRender: function () {
            Dep.prototype.afterRender.call(this);

            this.$button = this.$el.find('[data-action="order"]');
            this.checkButtonStyles();
        },

        checkButtonStyles: function () {
            if (!this.$button) return;

            if (this.orderedValue) {
                this.$button.removeClass("btn-danger");
                this.$button.addClass("btn-success");
                this.$button.text("Objednáno");
            } else {
                this.$button.removeClass("btn-success");
                this.$button.addClass("btn-danger");
                this.$button.text("Objednat");
            }
        },

        actionOrder: function () {
            this.getRouter().navigate("#SupplierOrder/create", {
                trigger: false,
            });
            let quantity = this.model.get("minimumStockQuantity");

            if (quantity === null) {
                quantity = 1;
            } else {
                quantity *= 3;
            }

            this.getRouter().dispatch("SupplierOrder", "create", {
                attributes: {
                    name: this.model.get("name"),
                    accountId: this.model.get("primarySupplierId"),
                    accountName: this.model.get("primarySupplierName"),
                    itemsRecordList: [
                        {
                            productId: this.model.get("id"),
                            productName: this.model.get("name"),
                            name: this.model.get("name"),
                            quantity,
                        },
                    ],
                },
            });
        },

        fetch: function () {
            const data = {};

            data[this.name] = this.orderedValue;

            return data;
        },
    });
});

