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

define('google:views/google/panels/gmail', 'view', function (Dep) {

    return Dep.extend({

        template: 'google:google/panel',

        productName: 'gmail',

        fieldList:[],

        isBlocked: false,

        fields: {
            gmailEmailAddress: {
                type: 'varchar',
                view: 'google:views/google/fields/gmail-email-address',
                required: true,
            },
        },

        data: function () {
            return {
                integration: this.integration,
                helpText: this.helpText,
                isActive: this.model.get(this.productName + 'Enabled') || false,
                isBlocked: this.isBlocked,
                fields: this.fieldList,
                hasFields: this.fieldList.length > 0,
                name: this.productName
            };
        },

        setup: function () {
            var version = this.getConfig().get('version');
            var versionArr = version.split('.');
            if (version !== 'dev' && versionArr.length > 2 && parseInt(versionArr[0]) * 100 + parseInt(versionArr[1]) < 506) {
                this.isBlocked = true;
            }

            this.model = this.options.model;
            this.id = this.options.id;
            this.model.defs.fields = $.extend(this.model.defs.fields, this.fields);
            this.model.populateDefaults();
            this.fieldList = [];
            for (i in this.fields) {
                this.createFieldView(this.fields[i].type, this.fields[i].view || null, i, false);
            }
        },

        setConnected: function () {
        },

        createFieldView: function (type, view, name, readOnly, params) {
            var fieldView = view || this.getFieldManager().getViewName(type);
            this.createView(name, fieldView, {
                model: this.model,
                el: this.options.el + ' .field-' + name,
                defs: {
                    name: name,
                    params: params
                },
                mode: readOnly ? 'detail' : 'edit',
                readOnly: readOnly,
            });
            this.fieldList.push(name);
        },

        validate: function () {
            return this.getView('gmailEmailAddress').validate();
        },

    });
});
