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

define('advanced:views/report/fields/chart-color-list',
['views/fields/array', 'advanced:report-helper', 'lib!Colorpicker'], function (Dep, ReportHelper) {

    return Dep.extend({

        maxItemLength: 500,

        setup: function () {
            Dep.prototype.setup.call(this);

            this.reportHelper = new ReportHelper(
                this.getMetadata(),
                this.getLanguage(),
                this.getDateTime(),
                this.getConfig(),
                this.getPreferences()
            );

            this.translatedOptions = Espo.Utils.clone(this.model.get('chartColors') || {});

            this.on('change', this.initColorpicker);

            this.listenTo(this.model, 'change', (m, o) => {
                if (!o.ui) {
                    return;
                }

                if (!m.hasChanged('groupBy') && !m.hasChanged('columns') && !m.hasChanged('chartType')) {
                    return;
                }

                this.pupulateItems();
            });

            this.events['change input.role'] = e => {
                let $target = $(e.currentTarget);

                $target.closest('.list-group-item').find('.colored-label').css('color', $target.val());
            };
        },

        getItemHtml: function (value) {
            let color = (value in this.translatedOptions) ?
                this.translatedOptions[value] :
                '#9395FA';

            let chartType = this.model.get('chartType');

            let translatedValue = value;

            if (~['Line', 'BarHorizontal', 'BarVertical', 'Radar'].indexOf(chartType)) {
                translatedValue = this.reportHelper.translateGroupName(value, this.model.get('entityType'));
            }
            else {
                let fieldData = this.getGroupFieldData(chartType === 'Pie');

                let entityType = fieldData.entityType;
                let field = fieldData.field;
                let fieldType = fieldData.fieldType;

                if (fieldType === 'enum') {
                    translatedValue = this.getLanguage().translateOption(value, field, entityType);
                }
            }

            let escapedValue = this.getHelper().escapeString(value);
            let escapedColor = this.getHelper().escapeString(color);
            translatedValue = this.getHelper().escapeString(translatedValue);

            let html = '' +
            '<div class="list-group-item link-with-role form-inline" data-value="' + escapedValue + '">' +
                '<div class="pull-left" style="width: 92%; display: inline-block;">' +
                    '<input data-name="translatedValue" data-value="' + escapedValue + '" class="role form-control input-sm pull-right" value="'+escapedColor+'" style="width: 80px">' +
                    '<div class="colored-label" style="color: '+escapedColor+'">' + translatedValue + '</div>' +
                '</div>' +
                '<div style="width: 8%; display: inline-block; vertical-align: top;">' +
                    '<a role="button" tabindex="0" class="pull-right" data-value="' + escapedValue + '" data-action="removeValue"><span class="fas fa-times"></a>' +
                '</div><br style="clear: both;" />' +
            '</div>';

            return html;
        },

        fetch: function () {
            let data = Dep.prototype.fetch.call(this);

            data.chartColors = {};

            (data[this.name] || []).forEach(value => {
                data.chartColors[value] = this.$el
                    .find('input[data-name="translatedValue"][data-value="'+value+'"]').val() || value;
            });

            return data;
        },

        afterRender: function () {
            Dep.prototype.afterRender.call(this);

            if (this.isEditMode()) {
                this.initColorpicker();
            }
        },

        initColorpicker: function () {
            this.$el.find('input.role').each((i, el) => {
                if ($(el).hasClass('colorpicker-element')) {
                    return;
                }

                $(el).colorpicker({
                    format: 'hex'
                });
            });
        },

        getGroupFieldData: function (isFirstIndex) {
            let groupByList = this.model.get('groupBy') || [];

            if (!isFirstIndex && groupByList.length < 2) {
                return;
            }

            if (isFirstIndex && groupByList.length < 1) {
                return;
            }

            let index = 1;

            if (isFirstIndex) index = 0;

            let groupBy = groupByList[index];
            let field = groupBy;

            let entityType = this.model.get('entityType');

            if (~groupBy.indexOf(':')) {
                field = groupBy.split(':')[1];
            }

            if (~groupBy.indexOf('.')) {
                let arr = field.split('.');
                field = arr[1];

                let link = arr[0];
                entityType = this.getMetadata().get(['entityDefs', entityType, 'links', link, 'entity']);

                if (!entityType) {
                    return;
                }
            }

            let fieldType = this.getMetadata().get(['entityDefs', entityType, 'fields', field, 'type']);

            return {
                entityType: entityType,
                field: field,
                fieldType: fieldType,
            };
        },

        pupulateItems: function () {
            let itemList = [];
            let chartColors = {};

            let chartType = this.model.get('chartType');

            let isFilled = false;

            let groupByList = this.model.get('groupBy') || [];

            if (groupByList.length <= 1) {
                if (~['Line', 'BarHorizontal', 'BarVertical', 'Radar'].indexOf(chartType)) {
                    itemList = Espo.Utils.clone(this.model.get('columns') || [])
                        .filter(item => {
                            return this.reportHelper.isColumnNumeric(item, this.model.get('entityType'));
                        });

                    if (itemList.length === 1 && chartType) {
                        itemList = [];
                    }

                    isFilled = true;
                }
            }

            if (!isFilled) {
                let fieldData = this.getGroupFieldData(chartType === 'Pie');

                if (fieldData) {
                    let entityType = fieldData.entityType;
                    let fieldType = fieldData.fieldType;
                    let field = fieldData.field;

                    if (~['enum', 'varchar'].indexOf(fieldType)) {
                        let optionList = Espo.Utils.clone(
                            this.getMetadata().get(['entityDefs', entityType, 'fields', field, 'options']) || []);

                        if (optionList.length) {
                            if (optionList.length <= 8) {
                                itemList = optionList;
                            }
                        }
                    }
                }
            }

            if (itemList.length <= 8) {
                let colorList = this.getThemeManager().getParam('chartColorList') || [];

                if (itemList.length <= 5) {
                    colorList = this.getThemeManager().getParam('chartColorAlternativeList') || [];
                }

                itemList.forEach((item, i) => {
                    if (i > colorList.length - 1) {
                        return;
                    }

                    chartColors[item] = colorList[i];
                });
            }

            this.translatedOptions = chartColors;

            this.model.set({
                chartColorList: itemList,
                chartColors: chartColors
            }, {ui: true});

            this.reRender();
        },
    });
});
