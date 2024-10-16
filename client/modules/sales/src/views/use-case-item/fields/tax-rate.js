/*********************************************************************************
 * The contents of this file are subject to the EspoCRM Sales Pack
 * Agreement ("License") which can be viewed at
 * https://www.espocrm.com/sales-pack-agreement.
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * sublicense, resell, rent, lease, distribute, or otherwise  transfer rights
 * or usage to the software.
 * 
 * Copyright (C) 2015-2020 Letrium Ltd.
 * 
 * License ID: ab90ca3eab7c48e8ae6409bc1af8bf16
 ***********************************************************************************/

Espo.define('sales:views/use-case-item/fields/tax-rate', 'views/fields/float', function (Dep) {

    return Dep.extend({

        listTemplate: 'sales:use-case-item/fields/tax-rate/list',

        detailTemplate: 'sales:use-case-item/fields/tax-rate/detail',

    });
});
