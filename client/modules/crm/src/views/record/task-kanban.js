define('crm:views/record/task-kanban', ['views/record/kanban'], function (Dep) {

    return Dep.extend({
        itemViewName: 'crm:views/record/task-kanban-item'
    });
});

