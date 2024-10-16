define('warehouse-management:handlers/warehouse-transfer/cancel-action', ['warehouse-management:handlers/state-changing-action'], function (Dep) {
    return Dep.extend({

        state: 'Canceled',

        finalStates: ['Canceled', 'Transferred'],

        name: 'cancel',

    });
});
