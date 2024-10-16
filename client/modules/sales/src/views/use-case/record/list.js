/*********************************************************************************
 * helou helou
 ***********************************************************************************/

Espo.define('sales:views/use-case/record/list', 'views/record/list', function (Dep) {

    return Dep.extend({

        rowActionsView: 'views/record/row-actions/view-and-edit'

    });

});
