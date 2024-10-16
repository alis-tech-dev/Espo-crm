define(['views/base'], function (Dep) {
    return class extends Dep {
        template = 'main:sales-order/entry';

        setup() {
            super.setup();

            const promises = [];
            promises.push(
                this.createView(
                    'items',
                    'main:views/sales-order/fields/items',
                    {
                        el: this.options.el + ` .field-recordList`,
                        model: this.model,
                        name: 'items',
                        scope: 'SalesOrder',
                        parentModel: this.options.parentModel,
                        params: this.getMetadata().get([
                            'entityDefs',
                            'SalesOrder',
                            'fields',
                            'items',
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
                    'files',
                    'views/fields/attachment-multiple',
                    {
                        el: this.options.el + ` .field-files`,
                        model: this.model,
                        name: 'files',
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
                    'description',
                    'views/fields/text',
                    {
                        el: this.options.el + ` .field-description`,
                        model: this.model,
                        name: 'description',
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

            promises.push(
                this.createView(
                    'solution',
                    'views/fields/text',
                    {
                        el: this.options.el + ` .field-solution`,
                        model: this.model,
                        name: 'solution',
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
                    'totalAmount',
                    'views/fields/number',
                    {
                        el: this.options.el + ` .field-totalAmount`,
                        model: this.model,
                        name: 'totalAmount',
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
                    'totalDiscount',
                    'views/fields/number',
                    {
                        el: this.options.el + `.field-totalDiscount`,
                        model: this.model,
                        name: 'totalDiscount',
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
                    'grandTotalAmount',
                    'views/fields/number',
                    {
                        el: this.options.el + `.field-grandTotalAmount`,
                        model: this.model,
                        name: 'grandTotalAmount',
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
                this.getView('items').setMode(mode),
                this.getView('files').setMode(mode),
                this.getView('description').setMode(mode),
                this.getView('name').setMode(mode),
                this.getView('solution').setMode(mode),
                this.getView('totalAmount').setMode(mode),
                this.getView('totalDiscount').setMode(mode),
                this.getView('grandTotalAmount').setMode(mode),
            ]);
        }
    };
});
