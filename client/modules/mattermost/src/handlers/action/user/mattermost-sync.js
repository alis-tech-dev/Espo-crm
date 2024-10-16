define(['action-handler'], function (Dep) {
    return Dep.extend({
        checkVisibility: function () {
            return this.view.getUser().isAdmin() && this.view.model.get('mattermostSyncEnabled');
        },

        actionMattermostSync: function () {
            this.view.confirm(this.view.translate('confirmation', 'messages'), () => {
                this.view.notify('Loading...');
                Espo.Ajax.getRequest('User/action/forceMattermostSync', {
                    id: this.view.model.id
                }).then(() => {
                    Espo.Ui.notify('Done', 'success');
                });
            });
        },
    });
});
