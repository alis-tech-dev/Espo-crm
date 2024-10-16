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

define('advanced:views/bpmn-flowchart-element/record/task-send-message-edit',
[
    'advanced:views/bpmn-flowchart-element/record/edit',
    'advanced:views/bpmn-flowchart-element/record/task-send-message-detail'
], function (Dep, Detail) {

    return Dep.extend({

        setup: function () {
            Dep.prototype.setup.call(this);

            Detail.prototype.controlFieldsVisibility.call(this);

            this.listenTo(this.model, 'change', () => {
                if (this.model.hasChanged('from') || this.model.hasChanged('to') || this.model.hasChanged('replyTo')) {
                    Detail.prototype.controlFieldsVisibility.call(this);
                }
            });
        },
    });
});
