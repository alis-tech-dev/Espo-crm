define('warehouse-management:handlers/goods-issue/process-action', ['warehouse-management:handlers/state-changing-action'], function (Dep) {
    return Dep.extend({

        state: 'Processing',

        finalStates: ['Canceled', 'Issued'],

        name: 'process',

    });
});
