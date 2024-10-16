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

define('advanced:views/bpmn-flowchart-element/fields/task-send-message-from', ['views/fields/enum'], function (Dep) {

    return Dep.extend({

        setupOptions: function () {
            Dep.prototype.setupOptions.call(this);

            this.params.options = Espo.Utils.clone(this.params.options);

            let linkOptionList = this.getLinkOptionList(true, true);

            linkOptionList.forEach(item => {
                this.params.options.push(item);
            });

            this.translateOptions();
        },

        translateOptions: function () {
            this.translatedOptions = {};

            let entityType = this.model.targetEntityType;

            this.params.options.forEach(item => {
                if (item.indexOf('link:') === 0) {
                    let link = item.substring(5);

                    if (~link.indexOf('.')) {
                        let arr = link.split('.');
                        link = arr[0];

                        let subLink = arr[1];

                        if (subLink === 'followers') {
                            this.translatedOptions[item] = this.translate('Related', 'labels', 'Workflow') + ': ' +
                                this.translate(link, 'links', entityType) +
                                '.' + this.translate('Followers');

                            return;
                        }

                        let relatedEntityType = this.getMetadata()
                            .get(['entityDefs', entityType, 'links', link, 'entity']);

                        this.translatedOptions[item] = this.translate('Related', 'labels', 'Workflow') + ': ' +
                            this.translate(link, 'links', entityType) +
                            '.' + this.translate(subLink, 'links', relatedEntityType);

                        return;
                    }

                    this.translatedOptions[item] = this.translate('Related', 'labels', 'Workflow') + ': ' +
                        this.translate(link, 'links', entityType);

                    return;

                }

                this.translatedOptions[item] = this.getLanguage()
                    .translateOption(item, 'emailAddress', 'BpmnFlowchartElement');
            });

            this.translatedOptions['targetEntity'] =
                this.getLanguage().translateOption('targetEntity', 'emailAddress', 'BpmnFlowchartElement') + ': ' +
                this.translate(entityType, 'scopeNames') + '';
        },

        getLinkOptionList: function (onlyUser, noMultiple) {
            let list = [];

            let entityType = this.model.targetEntityType;

            Object.keys(this.getMetadata().get(['entityDefs', entityType, 'links']) || {}).forEach(link => {
                let defs = this.getMetadata().get(['entityDefs', entityType, 'links', link]) || {};

                if (defs.type === 'belongsTo' || defs.type === 'hasMany') {
                    let foreignEntityType = defs.entity;

                    if (!foreignEntityType) {
                        return;
                    }

                    if (defs.type === 'hasMany') {
                        if (noMultiple) {
                            return;
                        }

                        if (
                            this.getMetadata().get(['entityDefs', entityType, 'fields', link, 'type']) !==
                            'linkMultiple'
                        ) {
                            return;
                        }
                    }

                    if (onlyUser && foreignEntityType !== 'User') {
                        return;
                    }

                    let fieldDefs = this.getMetadata().get(['entityDefs', foreignEntityType, 'fields']) || {};

                    if ('emailAddress' in fieldDefs && fieldDefs.emailAddress.type === 'email') {
                        list.push('link:' + link);
                    }
                }
                else if (defs.type === 'belongsToParent') {
                    if (onlyUser) {
                        return;
                    }

                    list.push('link:' + link);
                }
            });

            Object.keys(this.getMetadata().get(['entityDefs', entityType, 'links']) || {}).forEach(link => {
                let defs = this.getMetadata().get(['entityDefs', entityType, 'links', link]) || {};

                if (defs.type !== 'belongsTo') {
                    return;
                }

                let foreignEntityType = this.getMetadata().get(['entityDefs', entityType, 'links', link, 'entity']);

                if (!foreignEntityType) {
                    return;
                }

                if (foreignEntityType === 'User') {
                    return;
                }

                if (!noMultiple) {
                    if (this.getMetadata().get(['scopes', foreignEntityType, 'stream'])) {
                        list.push('link:' + link + '.followers');
                    }
                }

                Object.keys(this.getMetadata().get(['entityDefs', foreignEntityType, 'links']) || {}).forEach(subLink => {
                    let subDefs = this.getMetadata()
                        .get(['entityDefs', foreignEntityType, 'links', subLink]) || {};

                    if (subDefs.type === 'belongsTo' || subDefs.type === 'hasMany') {
                        let subForeignEntityType = subDefs.entity;

                        if (!subForeignEntityType) {
                            return;
                        }

                        if (subDefs.type === 'hasMany') {
                            if (
                                this.getMetadata()
                                    .get(['entityDefs', subForeignEntityType, 'fields', subLink, 'type']) !==
                                'linkMultiple'
                            ) {
                                return;
                            }
                        }

                        if (onlyUser && subForeignEntityType !== 'User') {
                            return;
                        }

                        let fieldDefs = this.getMetadata()
                            .get(['entityDefs', subForeignEntityType, 'fields']) || {};

                        if ('emailAddress' in fieldDefs && fieldDefs.emailAddress.type === 'email') {
                            list.push('link:' + link + '.' + subLink);
                        }
                    }
                });
            });

            Object.keys(this.getMetadata().get(['entityDefs', entityType, 'links']) || {}).forEach(link => {
                if (
                    this.getMetadata().get(['entityDefs', entityType, 'links', link, 'type']) ===
                    'belongsToParent'
                ) {
                    list.push('link:' + link + '.' + 'assignedUser');

                    if (!onlyUser) {
                        list.push('link:' + link + '.' + 'followers');
                    }
                }
            });

            return list;
        },
    });
});
