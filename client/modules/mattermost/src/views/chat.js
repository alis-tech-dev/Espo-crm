define('mattermost:views/chat', ['views/base'], function (Dep) {
    return Dep.extend({
        template: 'mattermost:views/chat',

        el: '#main',

        disabled: false,

        mattermostServer: null,

        mattermostToken: null,

        data: function () {
            return {
                server: this.mattermostServer,
                disabled: this.disabled,
            };
        },

        setup: function () {
            this.mattermostServer = this.getConfig().get('mattermostServerUrl');
            this.userToken = this.getUser().get('mattermostToken');

            if (!this.getUser().get('mattermostSyncEnabled') || !this.userToken || !this.mattermostServer) {
                this.disabled = true;
                return;
            }

            const xhr = new XMLHttpRequest();

            xhr.open('POST', this.mattermostServer + '/plugins/mattermost-autocrm-integration/auth/set-cookie', true);
            xhr.setRequestHeader('Content-type', 'application/json');
            xhr.setRequestHeader('Authorization', 'Bearer ' + this.userToken);
            xhr.onreadystatechange = () => {
                if (xhr.readyState === 4) {
                    this.wait(false);
                }
            };
            xhr.onerror = () => {
                this.wait(false);
            };
            xhr.withCredentials = true;

            this.wait(true);
            xhr.send(JSON.stringify({
                'token': this.userToken,
            }));
        },

        afterRender: function () {
            Dep.prototype.afterRender.call(this);

            if (this.disabled) {
                return;
            }

            $(document.body).addClass('contains-mattermost');
        },

        onRemove: function () {
            if (this.disabled) {
                return;
            }

            $(document.body).removeClass('contains-mattermost');
        }
    });
});
