define('crm:views/record/task-kanban-item', ['views/record/kanban-item'], function (Dep) {

    return Dep.extend({
        template: 'crm:record/task-kanban-item',

        data: function () {
            var data = Dep.prototype.data.call(this);
            data.panelClass = "priority-" + this.model.get("priority").toLowerCase();
            return data;
        }
    });
});

