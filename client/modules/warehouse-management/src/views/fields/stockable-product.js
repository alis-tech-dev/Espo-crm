define('warehouse-management:views/fields/stockable-product', ['views/fields/link'], function (Dep) {
    return Dep.extend({

        selectPrimaryFilterName: 'stockable'

    });
});
