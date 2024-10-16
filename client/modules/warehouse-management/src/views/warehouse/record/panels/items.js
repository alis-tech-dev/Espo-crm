define('warehouse-management:views/warehouse/record/panels/items', ['views/record/panels/relationship'], function (Dep) {
    return Dep.extend({

        setup: function () {
            const type = this.model.get('type');

            this.defs = this.defs || {};
            this.defs.layout = `listWarehouse${type}`;

            Dep.prototype.setup.call(this);
        }

    });
});
