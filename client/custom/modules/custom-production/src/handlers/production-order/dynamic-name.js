define(['dynamic-handler'], Dep => {
    return class extends Dep {
        async onChangeProductWarehouseId(_model, _val, options) {
            if (options.ui) {
                this.loadWarehouseModel();
            }
        }

        async onChangeProductId(model, _val, options) {
            if (options.ui) {
                this.recordView.getModelFactory().create('Product', product => {
                    product.id = model.get('productId');

                    product.fetch().then(product => {
                        const attributes = {
                            productionModelId: product.defaultProductionModelId,
                            productionModelName: product.defaultProductionModelName,
                            productWarehouseId: product.warehouseId,
                            productWarehouseName: product.warehouseName,
                        };
                        const name = this.model.get('name');
                        if (!name || name !== product.name) {
                            attributes.name = product.name;
                        }
                        this.model.set(attributes);
                    });
                });
            }
        }
        async loadWarehouseModel() {
            const id = this.model.get('productWarehouseId');

            if (!id) {
                return;
            }

            const warehouse = await this.recordView
                .getModelFactory()
                .create('productWarehouse');

            warehouse.id = id;
            await warehouse.fetch();

        }
    };
});
