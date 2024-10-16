define('warehouse-management:handlers/goods-issue/cancel-action', ['warehouse-management:handlers/state-changing-action'], function (Dep) {
    return Dep.extend({

        state: 'Canceled',

        finalStates: ['Canceled', 'Issued'],

        name: 'cancel',

    });
});
