define(['views/list'], Dep => {
    return Dep.extend({
        keepCurrentRootUrl: true,

        setup: function () {
            Dep.prototype.setup.call(this);

            this.options.params = this.options.params || {};
            const params = this.options.params || {};

            if (params.entityType) {
                this.collection.where = [{
                    type: 'equals',
                    field: 'entityType',
                    value: params.entityType
                }];
            }
        },
    });
});
