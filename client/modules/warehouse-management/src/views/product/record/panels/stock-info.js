define('warehouse-management:views/product/record/panels/stock-info', ['views/record/panels/bottom'], function (Dep) {
    return Dep.extend({

        template: 'warehouse-management:product/record/panels/stock-info',

        defaultView: 'warehouse-management:views/product/record/panels/stock-info/simple',

        layoutName: 'listProductBase',

        warehouseList: [],

        /**
         * @type {Map<string, module:collection>}
         */
        collectionMap: new Map(),

        /**
         * @type {module:collection}
         */
        seedCollection: null,

        /**
         * @type {module:collection}
         */
        collection: null,

        data: function () {
            return {
                warehouseList: this.warehouseList,
                empty: this.warehouseList === 0,
            };
        },

        setup: function () {
            Dep.prototype.setup.call(this);

            this.wait(this.prepareCollection());

            this.listenTo(this.model, 'update-all', () => this.refresh());
            this.listenTo(this.model, 'update-warehouse', () => this.refresh());
        },

        refresh: function () {
            return this.collection.fetch();
        },

        prepareCollection: function () {
            this.collectionMap.clear();

            return this.getCollectionFactory().create('WarehouseItem').then(collection => {
                collection.url = this.getCollectionUrl();
                collection.where = [];
                collection.parentModel = this.model;

                this.seedCollection = collection;
                this.collection = this.seedCollection.clone();

                this.listenTo(this.collection, 'sync', () => {
                    this.prepareSubCollections();

                    this.prepareViews().then(() => {
                        if (this.isBeingRendered() || this.isRendered()) {
                            this.reRender();
                        }
                    });
                });

                this.collection.fetch();
            });
        },

        getCollectionUrl: function () {
            return `Product/stockInfo/${this.model.id}`;
        },

        prepareSubCollections: function () {
            const urlBase = this.getConfig().get('siteUrl').replace(/\/$/, '') + '/#Warehouse/view/';
            const data = (this.collection.dataAdditional || {}).groupList || {};

            this.warehouseList = [];

            for (const {warehouse, list, total} of data) {
                if (!this.collectionMap.has(warehouse.id)) {
                    const collection = this.seedCollection.clone();

                    collection.entityType = 'WarehouseItem';
                    collection.total = total;
                    collection.where.push({
                        field: 'parentId',
                        type: 'equals',
                        value: warehouse.id,
                    });

                    this.collectionMap.set(warehouse.id, collection);
                }

                const collection = this.collectionMap.get(warehouse.id);

                collection.reset(list);

                this.warehouseList.push({
                    type: warehouse.type,
                    id: warehouse.id,
                    name: warehouse.name,
                    url: urlBase + warehouse.id,
                    key: 'warehouse-' + warehouse.id,
                });
            }
        },

        prepareViews: function () {
            const promiseList = [];

            for (const {id, type, key} of this.warehouseList) {
                if (this.hasView(key)) {
                    continue;
                }

                const viewName = this.getMetadata().get(['warehouseTypes', type, 'productInfo', 'view']) || this.defaultView;
                const layoutName = this.getMetadata().get(['warehouseTypes', type, 'productInfo', 'layoutName']) || this.layoutName;

                promiseList.push(
                    this.createView(key, viewName, {
                        el: this.options.el + ` [data-warehouse-id="${id}"]`,
                        scope: 'WarehouseItem',
                        collection: this.collectionMap.get(id),
                        layoutName,
                        pagination: false,
                        showCount: false,
                        checkboxes: false,
                        buttonsDisabled: true,
                    })
                );
            }

            return Promise.all(promiseList);
        },

    });
});
