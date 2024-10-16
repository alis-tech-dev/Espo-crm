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

define('advanced:views/report/modals/export-grid', ['views/modal', 'model'], function (Dep, Model) {

    return Dep.extend({

        templateContent: '<div class="record">{{{record}}}</div>',

        setup: function () {
            this.buttonList = [
                {
                    name: 'export',
                    label: 'Export',
                    style: 'danger',
                },
                {
                    name: 'cancel',
                    label: 'Cancel',
                }
            ];

            this.model = new Model();
            this.model.name = 'Report';

            this.scope = this.options.scope;

            let exportFormat = (this.getMetadata().get('app.export.gridReportFormatList') || [])[0];

            this.model.set('exportFormat', exportFormat);

            this.createView('record', 'advanced:views/report/record/export-grid', {
                scope: this.scope,
                model: this.model,
                el: this.getSelector() + ' .record',
                columnList: this.options.columnList,
                columnsTranslation: this.options.columnsTranslation,
            });
        },

        actionExport: function () {
            let data = this.getView('record').fetch();

            this.model.set(data);

            if (this.getView('record').validate()) {
                return;
            }

            let returnData = {
                format: data.exportFormat,
                column: data.column,
            };

            this.trigger('proceed', returnData);
            this.close();
        },
    });
});
