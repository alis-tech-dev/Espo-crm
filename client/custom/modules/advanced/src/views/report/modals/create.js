/*********************************************************************************
 * The contents of this file are subject to the EspoCRM Advanced Pack
 * Agreement ("License") which can be viewed at
 * https://www.espocrm.com/advanced-pack-agreement.
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * sublicense, resell, rent, lease, distribute, or otherwise  transfer rights
 * or usage to the software.
 *
 * Copyright (C) 2015-2023 Letrium Ltd.
 *
 * License ID: 9e71abacf6ac199ee59911e8bc81aa87
 ***********************************************************************************/

define('advanced:views/report/modals/create', ['views/modal', 'model'], function (Dep, Model) {

    return Dep.extend({

        cssName: 'create-report',

        template: 'advanced:report/modals/create',

        data: function () {
            return {
                entityTypeList: this.entityTypeList,
                typeList: this.typeList,
            };
        },

        events: {
            'click [data-action="create"]': function (e) {
                let type = $(e.currentTarget).data('type');

                /** @type {module:views/fields/base.Class} */
                let entityTypeView = this.getView('entityType');

                entityTypeView.fetch();
                entityTypeView.validate();

                let entityType = this.model.get('entityType')

                if (!entityType) {
                    return;
                }

                this.trigger('create', {
                    type: type,
                    entityType: entityType,
                });
            }
        },

        setup: function () {
            this.buttonList = [
                {
                    name: 'cancel',
                    label: 'Cancel',
                    onClick: dialog => {
                        dialog.close();
                    },
                }
            ];

            this.typeList = this.getMetadata().get('entityDefs.Report.fields.type.options');

            let scopes = this.getMetadata().get('scopes');
            let entityListToIgnore = this.getMetadata().get('entityDefs.Report.entityListToIgnore') || [];
            let entityListAllowed = this.getMetadata().get('entityDefs.Report.entityListAllowed') || [];

            this.entityTypeList = Object.keys(scopes)
                .filter(scope => {
                    if (~entityListToIgnore.indexOf(scope)) {
                        return;
                    }

                    if (!this.getAcl().check(scope, 'read')) {
                        return;
                    }

                    let defs = scopes[scope];

                    return (
                        defs.entity &&
                        (defs.tab || defs.object || ~entityListAllowed.indexOf(scope))
                    );
                })
                .sort((v1, v2) => {
                     return this.translate(v1, 'scopeNamesPlural')
                         .localeCompare(this.translate(v2, 'scopeNamesPlural'));
                });

            this.entityTypeList.unshift('');

            this.model = new Model();

            this.createView('entityType', 'views/fields/enum', {
                model: this.model,
                mode: 'edit',
                name: 'entityType',
                el: this.getSelector() + ' [data-name="entityType"]',
                params: {
                    options: this.entityTypeList,
                    translation: 'Global.scopeNames',
                    required: true,
                },
                labelText: this.translate('entityType', 'fields', 'Report'),
            });

            this.header = this.translate('Create Report', 'labels', 'Report');
        },
    });
});
