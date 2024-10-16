define('warehouse-management:handlers/goods-issue/reserve-action', ['warehouse-management:handlers/state-changing-action'], function (Dep) {
    return Dep.extend({

        state: 'Reserving',

        finalStates: ['Canceled', 'Issued', 'Reserved'],

        name: 'reserve',

    });
});
