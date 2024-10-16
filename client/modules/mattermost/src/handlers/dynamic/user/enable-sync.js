define('mattermost:handlers/dynamic/user/enable-sync', ['dynamic-handler'], function (Dep) {
    return Dep.extend({
        init: function () {
            this.handleMattermostSync();
        },

        handleMattermostSync: function () {
            if (!this.model.isNew()) {
                return;
            }

            const allowed = ['regular', 'admin'].includes(this.model.get('type')) &&
                !!this.recordView.getConfig().get('mattermostServerUrl');

            this.model.set('mattermostSyncEnabled', allowed);

            if (allowed) {
                this.recordView.setFieldNotReadOnly('mattermostSyncEnabled');
            } else {
                this.recordView.setFieldReadOnly('mattermostSyncEnabled');
            }
        }
    });
});
