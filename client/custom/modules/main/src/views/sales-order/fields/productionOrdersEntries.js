define(['views/fields/base'], Dep => {
    return class extends Dep {
        editTemplate = 'main:sales-order/fields/items/edit';
        detailTemplate = 'main:sales-order/fields/items/detail';

        entries = [];
        listModels = {};
        seed = null;

        events = {
            'click [data-action="addEntry"]': () => {
                void this.addEntry();
            },

        };

        setup() {
            super.setup();
            console.log("model", this.model)
            this.entries = this.getEntries();
            console.log("entries1", this.entries)

            this.wait(
                new Promise(resolve => {
                    this.getModelFactory().create('SalesOrder', async seed => {
                        this.seed = seed;
                        resolve();
                    });
                }),
            );
        }

        async prepare() {
            for (const { key } of this.entries) {
                this.clearView(key);
            }

            this.entries = this.getEntries();
            console.log("entries2", this.entries)
            for (const entry of this.entries) {
                console.log("entry", entry);
                await this.createEntry(entry);
            }
        }

        async updateFieldsMode() {
            console.log("entries3", this.entries)
            for (const { key } of this.entries) {
                if (!this.hasView(key)) {
                    continue;
                }
                await this.getView(key).setMode(this.mode);
            }
        }

        async onEditModeSet() {
            await super.onEditModeSet();
            await this.updateFieldsMode();
        }

        async onDetailModeSet() {
            await super.onDetailModeSet();
            await this.updateFieldsMode();
        }

        async createEntry(entry) {
            const model = this.seed.clone();
            console.log("entry2", entry)
            model.set('name', entry.name);
            model.set('description', entry.description);
            model.set('solution', entry.solution);

            console.log("productionOrdersRecordList", entry.productionOrders);
            model.set('productionOrdersRecordList', entry.productionOrders);

            this.listenTo(model, 'change', () => {
                entry.name = model.get('name');
                entry.description = model.get('description');
                entry.solution = model.get('solution');
                entry.productionOrders = model.get('productionOrdersRecordList') || [];

                this.trigger('change');
            });

            return await this.createView(entry.key, 'main:views/sales-order/productionEntry', {
                el: this.options.el + ` .entry[data-key="${entry.key}"]`,
                model,
                parentModel: this.model,
                mode: this.mode,
            });
        }

        data() {
            return {
                entries: this.entries,
                empty: this.entries.length === 0,
                editMode: this.mode === 'edit',
            };
        }

        getEntries() {
            const entriesData = this.model.get('salesOrderProductionEntryData') || [];
            console.log('salesOrderProductionEntryData111', entriesData);
            const recordList = Espo.Utils.cloneDeep(
                this.model.get('productionOrdersRecordList') || [],
            );
            console.log('recordList', recordList);
            const itemMap = new Map();

            for (const item of recordList) {
                itemMap.set(item.entryKey, item);
            }

            const entries = [];
            let i = 0;

            for (const entry of entriesData) {
                const productionOrders = (entry?.ids || [])
                    .map(id => itemMap.get(id) || false)
                    .filter(item => item);

                entries.push({
                    name: entry?.name ?? '',
                    description: entry?.description ?? '',
                    solution: entry?.solution ?? '',
                    productionOrders: productionOrders,
                    key: `entry-${i++}`,
                });
            }
            console.log("entries3", entries)
            return entries;
        }

        async addEntry() {
            const entry = {
                name: '',
                description: '',
                solution: '',
                productionOrders: [],
                key: `entry-${this.entries.length}`,

            };

            this.$el.find('.no-data').toggle(this.entries.length === 0);
            this.$el
                .find('.entry-container')
                .append(`<div class="entry" data-key="${entry.key}"></div>`);

            this.entries.push(entry);

            const view = await this.createEntry(entry);

            view.render();

            this.trigger('change');
        }

        fetch() {
            const productionOrders = [];
            const entriesData = [];

            for (const entry of this.entries) {
                productionOrders.push(...entry.productionOrders);
                entriesData.push({
                    name: entry.name,
                    description: entry.description,
                    solution: entry.solution,
                    ids: entry.productionOrders.map(productionOrder => productionOrder.entryKey),
                });
            }
            console.log('productionOrders', productionOrders);
            console.log('entriesData', entriesData);


            return {
                productionOrdersRecordList: Espo.Utils.cloneDeep(productionOrders),
                salesOrderProductionEntryData: Espo.Utils.cloneDeep(entriesData),
            };
        }
    };
});
