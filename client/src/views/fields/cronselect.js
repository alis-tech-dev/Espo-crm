/************************************************************************
 * This file is part of EspoCRM.
 *
 * EspoCRM - Open Source CRM application.
 * Copyright (C) 2014-2020 Yuri Kuznetsov, Taras Machyshyn, Oleksiy Avramenko
 * Website: https://www.espocrm.com
 *
 * EspoCRM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * EspoCRM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with EspoCRM. If not, see http://www.gnu.org/licenses/.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "EspoCRM" word.
 ************************************************************************/


define('views/fields/cronselect', ['views/fields/base'], function (Dep) {

    return Dep.extend({

        type: 'text',

        listTemplate: 'fields/text/list',

        detailTemplate: 'fields/cronselect/detail',

        editTemplate: 'fields/cronselect/edit',

        events: {
        },

        data: function () {
            var data = Dep.prototype.data.call(this);
		if(!this.model.has(this.name) || this.model.get(this.name) == null) return {};
            var cron = this.model.get(this.name).split(";");
            data.isDayChecked = cron[1] === "D";
            data.isMonthChecked = cron[1] === "M";
            data.isYearChecked = cron[1] === "Y";
            data.amountOfDays = cron[0];
            return data;
        },

        setup: function () {
            Dep.prototype.setup.call(this);
        },

        fetch: function () {
            var data = {};
            data[this.name] = this.$el.find("#dateNumber").val() + ";" + this.$el.find("#typeOfDate").val();
            return data;
        },
    });
});
