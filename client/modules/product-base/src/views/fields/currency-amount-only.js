define(['views/fields/currency'], function(Dep) {
    return class extends Dep {
        // jshint ignore:start
        editTemplate = 'fields/float/edit';
        // jshint ignore:end

        setup() {
            super.setup();
            this.listenTo(this.model, 'change:unitPrice', () => {
                // console.log('Unit price changed:', this.model.get('unitPrice'));
            });
            // console.log(Object.keys(this.model._events));
        }
    };
});
