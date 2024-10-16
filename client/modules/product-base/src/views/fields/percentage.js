define('product-base:views/fields/percentage', ['views/fields/float'], function (Dep) {
    return Dep.extend({
        listTemplate: 'product-base:fields/percentage/list',

        detailTemplate: 'product-base:fields/percentage/detail',
    });
});
