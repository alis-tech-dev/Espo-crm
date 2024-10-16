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

define('advanced:views/report-panel/fields/column',
['views/fields/enum', 'advanced:views/report/fields/columns'], function (Dep, Columns) {

    return Dep.extend({

        setup: function () {
            Dep.prototype.setup.call(this);

            this.listenTo(this.model, 'update-columns', columnList => {
                this.params.options = columnList;
                Columns.prototype.setupTranslatedOptions.call(this, this.model.get('reportEntityType'));

                this.translatedOptions[''] = this.translate('All');

                this.reRender();
            });

            this.listenTo(this.model, 'change:columnList', () => {
                this.model.trigger('update-columns', this.model.get('columnList') || []);
            });
        },

        setupOptions: function () {
            this.params.options = Espo.Utils.clone(this.model.get('columnList'));

            if (
                !this.model.isNew &&
                this.model.get('reportType') === 'Grid' &&
                !this.params.options
            ) {
                this.listenToOnce(this.model, 'sync', () => {
                    if (this.model.get('columnList')) {
                        this.params.options = Espo.Utils.clone(this.model.get('columnList'));
                        Columns.prototype.setupTranslatedOptions.call(this, this.model.get('reportEntityType'));

                        this.translatedOptions[''] = this.translate('All');

                        this.reRender();
                    }
                });
            }

            if (!this.params.options && this.model.get('column')) {
                this.params.options = [this.model.get('column')];
            }

            if (!this.params.options) {
                this.params.options = [];
            }

            Columns.prototype.setupTranslatedOptions.call(this, this.model.get('reportEntityType'));

            this.translatedOptions[''] = this.translate('All');
        },
    });
});
