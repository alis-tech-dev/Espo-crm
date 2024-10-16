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

define('google:views/google/fields/monitored-contacts-groups', 'views/fields/link-multiple', function (Dep) {

    return Dep.extend({

        nameHashName: null,

        idsName: null,

        nameHash: null,

        events: {
            'click [data-action="selectLink"]': function () {
                var self = this;
                this.notify('Please wait...');

                this.createView('modal', 'google:views/google/modals/select-calendar', {
                    calendars: this.model.contactsGroupList
                }, function (view) {
                    self.notify(false);
                    view.render();
                    self.listenToOnce(view, 'select', function (calendar){
                        view.close();
                        self.addCalendar(calendar);
                    });
                });
            } ,
            'click [data-action="clearLink"]' : function (e) {
                    this.clearLink(e);
                },
        },

        addCalendar: function (calendarId) {
            this.addLink(calendarId, this.model.contactsGroupList[calendarId]);
        },

        afterRender: function () {
           this.$element = this.$el.find('input.main-element');
        },

        clearLink: function (e) {
            var id = $(e.currentTarget).data('id').toString();
            this.deleteLink(id);
        },

        setup: function () {
            this.nameHashName = this.name + 'Names';
            this.idsName = this.name + 'Ids';

            var self = this;

            this.ids = Espo.Utils.clone(this.model.get(this.idsName) || []);
            this.nameHash = Espo.Utils.clone(this.model.get(this.nameHashName) || {});

            this.listenTo(this.model, 'change:' + this.idsName, function () {
                this.ids = Espo.Utils.clone(this.model.get(this.idsName) || []);
                this.nameHash = Espo.Utils.clone(this.model.get(this.nameHashName) || {});
            }.bind(this));

        },

        afterRender: function () {
           this.renderLinks();
        },

        deleteLinkHtml: function (id) {
            var explodedId = id.split('/');
            var newId = explodedId[explodedId.length - 1];
            this.$el.find('.link-' + newId).remove();
        },

        addLinkHtml: function (id, name) {
            var conteiner = this.$el.find('.link-container');
            var explodedId = id.split('/');
            var $el = $('<div />').addClass('link-' + explodedId[explodedId.length - 1]).addClass('list-group-item');
            $el.html(name + '&nbsp');

            let escapedId = this.getHelper().escapeString(id);

            $el.append('<a role="button" class="pull-right" data-id="' + escapedId + '" data-action="clearLink"><span class="fas fa-times"></a>');
            conteiner.append($el);

            return $el;
        },

        fetch: function () {
            var data = {};
            if (this.$el.is(':visible')) {
                data[this.idsName] = this.ids;
                data[this.nameHashName] = this.nameHash;
            } else {
                data[this.idsName] = null;
                data[this.nameHashName] = null;
            }
            return data;
        },

        validateRequired: function () {
            if (this.$el.is(':visible') && this.model.isRequired(this.name)) {
                if (this.model.get(this.idsName).length == 0) {
                    var msg = this.translate('fieldIsRequired', 'messages').replace('{field}', this.translate(this.name, 'fields', this.model.name));
                    this.showValidationMessage(msg);
                    return true;
                }
            }
        },
    });
});
