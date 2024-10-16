define('product-base:views/fields/tax-class', ['views/fields/link'], function (Dep) {
    return Dep.extend({
        select: function (model) {
            Dep.prototype.select.call(this, model);

            this.model.set('taxRate', model.get('rate'));
        }
    });
});
