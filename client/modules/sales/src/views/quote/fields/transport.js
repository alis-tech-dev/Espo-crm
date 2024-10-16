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

Espo.define('sales:views/quote/fields/transport', ['views/fields/base'], function (Dep) {

    return Dep.extend({

        detailTemplate: 'sales:quote/fields/transport/detail',

        listTemplate: 'sales:quote/fields/transport/detail',

        editTemplate: 'sales:quote/fields/transport/edit',

        inlineEditDisabled: true,

        data: function () {
            return {
                transportId: this.model.get("transportId")
            };
        },

        events: {
            'click [data-action="editTransport"]': function (e) {
                this.editTransport();
            }
        },

        setup: function () {
            this.transportId = this.model.get('transportId');
            this.transportName = this.model.get('transportName');
        },

        fetch: function () {
            var data = {};
            data["transportId"] = this.transportId;
            data["transportName"] = this.transportName;

            return data;
        },

        getAttributeList: function () {
            return ['itemList'];
        },

        afterRender: function () {
            this.getModelFactory().create("UseCase", function (model) {
                model.id = this.transportId;

                if (model.id)
                    model.fetch().then(function () {
                        this.createView('itemList', 'sales:views/use-case/record/item-list', {
                            el: this.options.el + ' .item-list-container',
                            model: model,
                            mode: 'detail',
                            notToRender: true,
                        }, function (view) {
                            view.render();
                        }.bind(this));
                    }.bind(this));
            }.bind(this));
        },

        editTransport: function () {
            var transportItem = this.model.get('transportId') || null;
            if (transportItem === null) {
                this.getModelFactory().create("UseCase", function (model) {
                    model.set("name", "Transportation");
                    model.set("isTransport", true);
                    model.set("amountCurrency", this.model.get("amountCurrency"));

                    model.save().then(function () {
                        this.transportId = model.id;
                        this.transportName = model.name;

                        this.trigger('change');
                        this.model.save().then(function () {
                            this.createEditView(model.id);
                        }.bind(this))
                    }.bind(this));
                }, this);
            } else
                this.createEditView(transportItem);
        },

        createEditView: function (id) {
            var viewName = this.getMetadata().get('clientDefs.UseCase.modalViews.edit') || 'views/modals/edit';
            this.createView('quickEdit', viewName, {
                scope: "UseCase",
                id: id,
                sideDisabled: true
            }, function (view) {
                view.render();
                view.notify(false);

                this.listenToOnce(view, 'after:save', function() {
                    this.model.fetch().then(function () {
                        this.reRender();
                    }.bind(this));
                }, this);
            }.bind(this));
        }
    });
});
