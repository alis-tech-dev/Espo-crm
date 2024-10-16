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

define('views/fields/taskchecklist', ['views/fields/array'], function (Dep) {

    return Dep.extend({

        type: 'taskchecklist',

        listTemplate: 'fields/array/list',

        detailTemplate: 'fields/taskchecklist/detail',

        editTemplate: 'fields/taskchecklist/edit',

        selectRecordsView: 'views/modals/select-records',

        isInversed: false,

        events: {},

        data: function () {
            return _.extend({
                optionDataList: this.getOptionDataList(),
            }, Dep.prototype.data.call(this));
        },

        setup: function () {

            this.parentScope = this.model.name;
            this.link = 'tasks';
            if (this.model.id != undefined) {
                this.url = this.model.name + '/' + this.model.id + '/' + this.link;
                var orderBy = this.defs.orderBy || this.defs.sortBy || this.orderBy;
                var order = this.defs.orderDirection || this.orderDirection || this.order;

                if ('asc' in this.defs) { // TODO remove in 5.8
                    order = this.defs.asc ? 'asc' : 'desc';
                }

                if (!orderBy) {
                    orderBy = this.getMetadata().get(['entityDefs', this.scope, 'collection', 'orderBy']);
                    order = this.getMetadata().get(['entityDefs', this.scope, 'collection', 'order'])
                }

                if (orderBy && !order) {
                    order = 'asc';
                }

                this.defaultOrderBy = orderBy;
                this.defaultOrder = order;
                this.wait(true);

                this.getCollectionFactory().create('Task', function (collection) {
                    this.collection = collection;
                    collection.url = this.url;
                    collection.orderBy = "createdAt";
                    collection.order = "desc";
                    collection.maxSize = this.getConfig().get('recordsPerPageSmall') || 5;
                    collection.data.primaryFilter = "";
                    //this.setFilter(this.filter);

                    this.wait(false);
                }, this);

                this.listenTo(this.model, 'after:save', function () {
                    this.collection.fetch().then(function () {
                        this.reRender();
                    }.bind(this));
                }.bind(this));

                this.collection.fetch().then(function () {
                    this.addActionHandler('selectLink', function () {
                        this.notify('Loading...');

                        var viewName = this.getMetadata().get('clientDefs.' + this.foreignScope + '.modalViews.select') || this.selectRecordsView;
                        this.createView('dialog', viewName, {
                            scope: 'Task',
                            createButton: true,
                            multiple: true
                        }, function (dialog) {
                            dialog.render();
                            this.notify(false);
                            this.listenToOnce(dialog, 'select', function (models) {
                                this.clearView('dialog');
                                if (Object.prototype.toString.call(models) !== '[object Array]') {
                                    models = [models];
                                }
                                models.forEach(function (model) {
                                    //this.addLink(model);
                                    model.set("taskParentId", this.model.get('id'));
                                    model.save();
                                    this.collection.add(model);
                                }.bind(this));
                                this.reRender();
                            });
                        }, this);
                    });
                    this.items = []
                    this.collection.models.forEach(function (item) {
                        this.items.push({
                            id: item.get('id'),
                            name: item.get('name'),
                            status: item.get('status')
                        })
                    }.bind(this))
                    this.reRender();
                }.bind(this));
                this.events['click a[data-action="clearLink"]'] = function (e) {
                    var id = $(e.currentTarget).attr('data-id');
                    var item = this.collection.get(id);
                    item.set("taskParentId", null);
                    item.save();
                    this.collection.remove(this.collection.get(id));
                    this.reRender();
                };
            }
            Dep.prototype.setup.call(this);

            this.params.options = this.params.options || [];

            this.isInversed = this.params.isInversed || this.options.isInversed || this.isInversed;
        },

        addLink: function (item) {
            this.items.push({
                id: item.get('id'),
                name: item.get('name'),
                status: item.get('status')
            });
        },

        afterRender: function () {
            if (this.mode == 'search') {
                this.renderSearch();
            }

            if (this.isEditMode()) {
                this.$el.find('input').on('change', function (e) {
                    this.collection.get($(e.currentTarget).attr('data-id')).set("isChanged", true);
                    this.trigger('change');
                }.bind(this));
            }
        },

        getOptionDataList: function () {
            var valueList = this.model.get(this.name) || [];
            var list = [];
            if (this.collection != undefined) {
                this.collection.models.forEach(function (item) {
                    console.log(item.get("status"));
                    var isChecked = ["completed", "archiv"].indexOf(item.get("status").toLowerCase()) > -1;
                    var dataName = 'checklistItem-' + this.name + '-' + item.get("name");
                    var id = /*'checklist-item-' + this.name + '-' + */item.get("id");

                    if (this.isInversed) isChecked = !isChecked;
                    list.push({
                        name: item.get("name"),
                        isChecked: isChecked,
                        dataName: dataName,
                        id: id,
                        label: item.get("name"),
                        link: "#Task/view/" + item.get("id")
                    });
                }, this);

                return list;
            } else {
                return;
            }
        },

        fetch: function () {
            var list = [];
            debugger;
            if (this.collection != undefined) {
                this.collection.models.forEach(function (item) {
                    var $item = this.$el.find('input[data-name="checklistItem-' + this.name + '-' + item.attributes.name + '"]');
                    var isChecked = $item.get(0) && $item.get(0).checked;
                    if (this.isInversed)
                        isChecked = !isChecked;
                    if (isChecked)
                        list.push(item);
                    if (item.get("isChanged")) {
                        item.save({
                            status: isChecked ? 'Completed' : 'Not Started'
                        }, {
                            patch: true,
                            success: function () {
                                Espo.Ui.success(this.translate('Saved'));
                            }.bind(this),
                        });
                        item.unset("isChanged");
                    }

                }, this);
                var data = {};
                data[this.name] = list;

                return data;
            } else {
                return;
            }
        },

        validateRequired: function () {
            if (this.isRequired()) {
                var value = this.model.get(this.name);
                if (!value || value.length == 0) {
                    var msg = this.translate('fieldIsRequired', 'messages').replace('{field}', this.getLabelText());
                    this.showValidationMessage(msg, '.checklist-item-container:last-child input');
                    return true;
                }
            }
        },

        validateMaxCount: function () {
            if (this.params.maxCount) {
                var itemList = this.model.get(this.name) || [];
                if (itemList.length > this.params.maxCount) {
                    var msg =
                        this.translate('fieldExceedsMaxCount', 'messages')
                            .replace('{field}', this.getLabelText())
                            .replace('{maxCount}', this.params.maxCount.toString());
                    this.showValidationMessage(msg, '.checklist-item-container:last-child input');
                    return true;
                }
            }
        },
    });
});
