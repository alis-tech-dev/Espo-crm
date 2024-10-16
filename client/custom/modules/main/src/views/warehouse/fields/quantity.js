define(['views/fields/base'], Dep => {
    return class extends Dep {
        setup() {
            super.setup();
            this.calculateQuantity();

        }

        calculateQuantity() {
            const warehouseId = this.model.get('id');
			this.ajaxGetRequest(`WarehouseItem/takeItems/${warehouseId}`);
        }
    }
});




