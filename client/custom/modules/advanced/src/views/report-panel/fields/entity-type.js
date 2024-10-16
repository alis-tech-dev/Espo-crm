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

define('advanced:views/report-panel/fields/entity-type', ['views/fields/entity-type'], function (Dep) {

    return Dep.extend({

        setupOptions: function () {
            var scopes = this.scopesMetadataDefs = this.getMetadata().get('scopes');

            this.params.options = Object.keys(scopes).filter(scope => {
                if (this.checkAvailability(scope)) {
                    return true;
                }
            });

            this.params.options.push('Team');

            this.params.options.sort((v1, v2) => {
                 return this.translate(v1, 'scopeNames').localeCompare(this.translate(v2, 'scopeNames'));
            });

            this.params.options.unshift('');
        }
    });
});
