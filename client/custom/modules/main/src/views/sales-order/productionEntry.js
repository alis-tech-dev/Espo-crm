define(['views/base'], function (Dep) {
    return class extends Dep {
        template = 'main:sales-order/productionEntry';

        setup() {
            super.setup();

            const promises = [];
            promises.push(
                this.createView(
                    'productionOrders',
                    'main:views/sales-order/fields/productionOrdersEntries',
                    {
                        el: this.options.el + ` .field-recordList`,
                        model: this.model,
                        name: 'productionOrders',
                        scope: 'SalesOrder',
                        parentModel: this.options.parentModel,
                        params: this.getMetadata().get([
                            'entityDefs',
                            'SalesOrder',
                            'fields',
                            'productionOrders',
                        ]),
                        mode: this.options.mode,
                        inlineEditDisabled: true,
                    },
                    view => {
                        this.listenTo(view, 'change', () => {
                            this.trigger('change');
                        });
                    },
                ),
            );

            promises.push(
                this.createView(
                    'name',
                    'views/fields/text',
                    {
                        el: this.options.el + ` .field-name`,
                        model: this.model,
                        name: 'name',
                        mode: this.options.mode,
                        inlineEditDisabled: true,
                    },
                    view => {
                        this.listenTo(view, 'change', () => {
                            this.trigger('change');
                        });
                    },
                ),
            );

            this.wait(Promise.all(promises));
        }

        setMode(mode) {
            return Promise.all([
                this.getView('productionOrders').setMode(mode),
                this.getView('name').setMode(mode),

            ]);
        }
    };
});
