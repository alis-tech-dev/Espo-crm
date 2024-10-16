define('warehouse-management:handlers/goods-receipt/cancel-action', ['warehouse-management:handlers/state-changing-action'], function (Dep) {
    return Dep.extend({

        state: 'Canceled',

        finalStates: ['Canceled', 'Received'],

        name: 'cancel',

    });
});
