define('warehouse-management:handlers/warehouse-transfer/process-action', ['warehouse-management:handlers/state-changing-action'], function (Dep) {
    return Dep.extend({

        state: 'Processing',

        finalStates: ['Canceled', 'Transferred'],

        name: 'process',

    });
});
