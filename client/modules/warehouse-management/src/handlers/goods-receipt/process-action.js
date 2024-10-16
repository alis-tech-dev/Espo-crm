define('warehouse-management:handlers/goods-receipt/process-action', ['warehouse-management:handlers/state-changing-action'], function (Dep) {
    return Dep.extend({

        state: 'Processing',

        finalStates: ['Canceled', 'Received'],

        name: 'process',

    });
});
