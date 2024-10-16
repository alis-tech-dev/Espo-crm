define(['accounting:views/fields/items'], function (Dep) {
    return class extends Dep {
        editTemplate = 'main:quote/fields/items-inner/edit';

        setup() {
            super.setup();

            this.listenTo(this.options.parentModel, 'change:priceListId', () => {
                this.updatePriceListInfo();
            });

            this.updatePriceListInfo();
        }

        async updatePriceListInfo() {
            const priceListId = this.options.parentModel.get('priceListId');

            if (priceListId !== this.priceListId) {
                this.priceListId = priceListId;

                if (priceListId) {
                    const priceList = await this.getPriceListEntity(priceListId);

                    if (priceList) {
                        this.priceType = priceList.get('name');
                        this.trigger('priceTypeChange', this.priceType);
                    }
                } else {
                    this.priceType = null;
                    this.trigger('priceTypeChange', this.priceType);
                }
            }
        }

        async populateModel(model) {
            super.populateModel(model);

            model.set('entryKey', Math.random().toString(16).slice(2));
        }

        getPriceListEntity(priceListId) {
            return new Promise(resolve => {
                this.getModelFactory().create('PriceList', priceList => {
                    priceList.id = priceListId;
                    priceList.fetch().then(() => resolve(priceList));
                });
            });
        }
    };
});

