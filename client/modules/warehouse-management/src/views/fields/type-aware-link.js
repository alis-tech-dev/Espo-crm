define('warehouse-management:views/fields/type-aware-link', ['views/fields/link'], function (Dep) {
    return Dep.extend({

        select: function (model) {
            Dep.prototype.select.call(this, model);

            this.model.set(this.name + 'Type', model.get('type'));
        }

    });
});
