define('mattermost:controllers/chat', 'controller', function (Dep) {

    return Dep.extend({

        defaultAction: 'chat',

        actionChat: function () {
            this.main('mattermost:views/chat', {}, view => {
                view.render();
            });
        }
    });

});
