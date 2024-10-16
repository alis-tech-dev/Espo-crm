define('warehouse-management:views/product/record/panels/stock-info/base', ['views/record/list'], function (Dep) {
    return Dep.extend({

        rowActionsView: 'views/record/row-actions/view-only',

        setup: function () {
            Dep.prototype.setup.call(this);

            this.listenTo(this.collection, 'reset', () => {
                this.buildRows(() => {
                    this.render();
                });
            });
        },

    });
});
