Espo.define('crm:views/dashlets/tasksKanban', 'crm:views/dashlets/tasks', function (Dep) {

    return Dep.extend({

        listView: 'views/record/kanban',

        beforeCollectionFetch: function (collection) {
            var userId = this.getOption("tasksFromIds");

            if (userId && userId.length) {
                userId.forEach(function(id) {
                    collection.where = [{
                        "type": "equals",
                        "attribute": "assignedUserId",
                        "value": id
                    }];
                });
            }

            collection.url = this.scope + '/action/listKanban';

            return collection;
        }
    });
});

