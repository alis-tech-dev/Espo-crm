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

define('advanced:views/report/filters/container-group', ['view'], function (Dep) {

    return Dep.extend({

        template: 'advanced:report/filters/container-group',

        events: {
            'click > a[data-action="removeGroup"]': function () {
                this.trigger('remove-item');
            }
        },

        data: function () {
            var showGroupTypeLabel = true;

            if (this.type === 'and' || this.type === 'or') {
                showGroupTypeLabel = false;
            }

            return {
                type: this.type,
                noOffset: this.options.level > 3,
                showGroupTypeLabel: showGroupTypeLabel
            };
        },

        setup: function () {
            this.filterData = this.options.filterData;
            this.scope = this.options.scope;
            this.type = this.filterData.type;

            this.createView('node', 'advanced:views/report/filters/node', {
                el: this.getSelector() + ' > .node',
                scope: this.scope,
                dataList: this.filterData.params.value || [],
                level: this.options.level,
                filterData: this.filterData,
                isHaving: this.options.isHaving,
            });
        },

        fetch: function () {
            return {
                id: this.filterData.id,
                type: this.filterData.type,
                params: {
                    type: this.filterData.type,
                    value: this.getView('node').fetch(),
                },
            };
        },
    });
});
