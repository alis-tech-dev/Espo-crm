define(['views/modals/related-list'], Dep => {
    return class extends Dep {
        template = 'main:sales-order/productionEntry';
        setup() {
            super.setup();
        }
    }
});