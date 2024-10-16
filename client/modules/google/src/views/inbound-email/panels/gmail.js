/*********************************************************************************
 * The contents of this file are subject to the EspoCRM Google Integration
 * Agreement ("License") which can be viewed at
 * https://www.espocrm.com/google-integration-agreement.
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * sublicense, resell, rent, lease, distribute, or otherwise  transfer rights
 * or usage to the software.
 *
 * Copyright (C) 2015-2023 Letrium Ltd.
 *
 * License ID: d222cd5ec22d93ad3eb7a092569d85b3
 ***********************************************************************************/

define('google:views/inbound-email/panels/gmail', 'view', function (Dep) {

    return Dep.extend({

        template: 'google:inbound-email/panels/gmail',

        data: function () {
            var data = {};

            return data;
        },

        events: {
            'click [data-action="connect"]': 'actionConnect',
            'click [data-action="disconnect"]': 'actionDisconnect',
        },

        setup: function () {
            this.isLoaded = false;

            this.id = this.model.id;

            Espo.Ajax.postRequest('GoogleGmail/action/ping', {
                id: this.id,
                entityType: this.model.entityType,
            }).then(
                function (response) {
                    this.clientId = response.clientId;
                    this.redirectUri = response.redirectUri;
                    if (response.isConnected) {
                        this.setConnected();
                    } else {
                        this.setNotConnected();
                    }
                }.bind(this)
            );
        },

        setConnected: function () {
            this.isLoaded = true;
            this.isConnected = true;

            this.reRender();
        },

        setNotConnected: function () {
            this.isLoaded = true;
            this.isConnected = false;

            this.reRender();
        },

        actionConnect: function () {
            this.popup({
                path: this.getMetadata().get(['integrations', 'Google', 'params', 'endpoint']),
                params: {
                    client_id: this.clientId,
                    redirect_uri: this.redirectUri,
                    scope: this.getMetadata().get(['integrations', 'Google', 'params', 'scopeGmail']),
                    response_type: 'code',
                    access_type: 'offline',
                    approval_prompt: 'force',
                }
            }, function (res) {
                if (res.error) {
                    Espo.Ui.notify(false);
                    return;
                }
                if (res.code) {
                    this.$el.find('[data-action="connect"]').addClass('disabled');

                    Espo.Ui.notify(this.translate('pleaseWait', 'messages'));

                    Espo.Ajax.postRequest('GoogleGmail/action/connect', {
                        id: this.id,
                        code: res.code,
                        entityType: this.model.entityType,
                    }).then(
                        function (response) {
                            this.notify(false);
                            if (response === true) {
                                this.setConnected();
                            } else {
                                this.setNotConnected();
                            }
                            this.$el.find('[data-action="connect"]').removeClass('disabled');
                        }.bind(this)
                    ).fail(
                        function () {
                            this.$el.find('[data-action="connect"]').removeClass('disabled');
                        }.bind(this)
                    );

                } else {
                    this.notify('Error occured', 'error');
                }
            });
        },

        actionDisconnect: function () {
            this.confirm(this.translate('disconnectConfirmation', 'messages', 'ExternalAccount'), function () {
                this.$el.find('[data-action="disconnect"]').addClass('disabled');
                this.$el.find('[data-action="connect"]').addClass('disabled');

                Espo.Ajax.postRequest('GoogleGmail/action/disconnect', {
                    id: this.id,
                    entityType: this.model.entityType,
                }).then(
                    function () {
                        this.setNotConnected();

                        this.$el.find('[data-action="disconnect"]').removeClass('disabled');
                        this.$el.find('[data-action="connect"]').removeClass('disabled');
                    }.bind(this)
                ).fail(
                    function () {
                        this.$el.find('[data-action="disconnect"]').removeClass('disabled');
                        this.$el.find('[data-action="connect"]').removeClass('disabled');
                    }.bind(this)
                );
            }.bind(this));
        },

        popup: function (options, callback) {
            options.windowName = options.windowName || 'ConnectWithOAuth';
            options.windowOptions = options.windowOptions || 'location=0,status=0,width=800,height=600';
            options.callback = options.callback || function(){ window.location.reload(); };

            var self = this;

            var path = options.path;

            var arr = [];
            var params = (options.params || {});
            for (var name in params) {
                if (params[name]) {
                    arr.push(name + '=' + encodeURI(params[name]));
                }
            }
            path += '?' + arr.join('&');

            var parseUrl = function (str) {
                var code = null;
                var error = null;

                str = str.substr(str.indexOf('?') + 1, str.length);
                str.split('&').forEach(function (part) {
                    var arr = part.split('=');
                    var name = decodeURI(arr[0]);
                    var value = decodeURI(arr[1] || '');

                    if (name == 'code') {
                        code = value;
                    }
                    if (name == 'error') {
                        error = value;
                    }
                }, this);
                if (code) {
                    return {
                        code: code,
                    }
                } else if (error) {
                    return {
                        error: error,
                    }
                }
            }

            var popup = window.open(path, options.windowName, options.windowOptions);
            var interval = window.setInterval(function () {
                if (popup.closed) {
                    window.clearInterval(interval);
                } else {
                    var res = parseUrl(popup.location.href.toString());
                    if (res) {
                        callback.call(self, res);
                        popup.close();
                        window.clearInterval(interval);
                    }
                }
            }, 500);
        },

    });
});
