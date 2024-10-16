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
 * Copyright (C) 2015-2020 Letrium Ltd.
 *
 * License ID: feb0be80d628ba740d989fcc51811aa3
 ***********************************************************************************/

Espo.define('views/dashlets/options/task-kanban', ['views/dashlets/options/base'], function (Dep) {

    return Dep.extend({

        template: 'advanced:dashlets/options/report',

        afterRender: function () {

            this.getModelFactory().create("Task", function (model) {
                var filterList = Object.keys(model.defs.fields);

                this.createView('runtimeFilters', 'advanced:views/report/runtime-filters', {
                    el: this.options.el + ' .runtime-filters-contanier',
                    entityType: "Task",
                    filterList: filterList,
                    filtersData: this.optionsData.filtersData || null,
                }, function (view) {
                    view.render();
                });
            }.bind(this));
        },

        fetchAttributes: function () {
            var attributes = Dep.prototype.fetchAttributes.call(this);

            var runtimeFiltersView = this.getView('runtimeFilters');
            if (runtimeFiltersView)
                attributes.filtersData = runtimeFiltersView.fetchRaw();

            return attributes;
        }
    });
});
