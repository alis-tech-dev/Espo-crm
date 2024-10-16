define(['views/record/panels/relationship'], function (Dep) {
    return class extends Dep {

        scope = 'GoodsReceipt' // jshint ignore:line

        setup() {
            this.url = this.scope + '/product/' + this.model.id;

            super.setup();
        }

    };
});
