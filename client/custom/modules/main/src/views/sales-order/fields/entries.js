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
            'click [data-action="deleteEntry"]': (event) => {
                const key = $(event.currentTarget).data('key');
                this.deleteEntry(key);
            },

        };
        async deleteEntry(key) {
            const index = this.entries.findIndex(entry => entry.key === key);
            if (index !== -1) {
        	const view = this.getView(key);
        	if (view) {
                this.clearView(key);
        	}
                this.entries.splice(index, 1);
                this.$el.find(`.entry[data-key="${key}"]`).remove();
		        view.render();
                this.trigger('change');
            }
        }

        setup() {
            super.setup();

            this.entries = this.getEntries();
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

            for (const entry of this.entries) {
                await this.createEntry(entry);
            }
        }

        async updateFieldsMode() {
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

        calculateTotalAmount(items) {
            let total = 0;
            items.forEach(item => {
                const amount = parseFloat(item.amount) || 0;
                total += amount;
            });
            return total.toFixed(2);
        }

        calculateTotalDiscount(items) {
            let discount = 0;
            items.forEach(item => {
                const unitPrice = parseFloat(item.unitPrice) || 0;
                const listPrice = parseFloat(item.listPrice) || 0;
                const quantity = parseFloat(item.quantity) || 0;

                const amount = (unitPrice - listPrice) * quantity;
                discount += amount;
            });
            return discount.toFixed(2);
        }

        async createEntry(entry) {
            const model = this.seed.clone();

            model.set('name', entry.name);
            model.set('description', entry.description);
            model.set('solution', entry.solution);
            model.set('itemsRecordList', entry.items);
            model.set('filesIds', entry.filesIds);
            model.set('filesNames', entry.filesNames);

            const totalAmount = parseFloat(this.calculateTotalAmount(entry.items));
            const totalDiscount = parseFloat(this.calculateTotalDiscount(entry.items));
            const grandTotalAmount = totalAmount + totalDiscount;

            model.set('totalAmount', totalAmount);
            model.set('totalDiscount', totalDiscount);
            model.set('grandTotalAmount', grandTotalAmount.toFixed(2));

            this.listenTo(model, 'change', () => {
                entry.name = model.get('name');
                entry.description = model.get('description');
                entry.solution = model.get('solution');
                entry.items = model.get('itemsRecordList') || [];
                entry.filesIds = model.get('filesIds') || [];
                entry.filesNames = model.get('filesNames') || [];

                const totalAmount = parseFloat(this.calculateTotalAmount(entry.items));
                const totalDiscount = parseFloat(this.calculateTotalDiscount(entry.items));
                const grandTotalAmount = totalAmount + totalDiscount;

                entry.totalAmount = totalAmount;
                entry.totalDiscount = totalDiscount;
                entry.grandTotalAmount = grandTotalAmount;

                model.set('totalAmount', totalAmount);
                model.set('totalDiscount', totalDiscount);
                model.set('grandTotalAmount', grandTotalAmount.toFixed(2));

                this.trigger('change');
            });

            return await this.createView(entry.key, 'main:views/sales-order/entry', {
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
            const entriesData = this.model.get('salesOrderEntryData') || [];
            const recordList = Espo.Utils.cloneDeep(
                this.model.get('itemsRecordList') || [],
            );

            const itemMap = new Map();

            for (const item of recordList) {
                itemMap.set(item.entryKey, item);
            }

            const entries = [];
            let i = 0;

            for (const entry of entriesData) {
                const items = (entry?.ids || [])
                    .map(id => itemMap.get(id) || false)
                    .filter(item => item);

                const totalAmount = parseFloat(this.calculateTotalAmount(items));
                const totalDiscount = parseFloat(this.calculateTotalDiscount(items));
                const grandTotalAmount = totalAmount + totalDiscount;

                entries.push({
                    name: entry?.name ?? '',
                    description: entry?.description ?? '',
                    solution: entry?.solution ?? '',
                    filesIds: entry?.filesIds ?? [],
                    filesNames: entry?.filesNames ?? [],
                    items: items,
                    key: `entry-${i++}`,
                    totalAmount,
                    totalDiscount,
                    grandTotalAmount,
                });
            }

            return entries;
        }

        async addEntry() {
            const entry = {
                name: '',
                description: '',
                solution: '',
                filesIds: [],
                filesNames: [],
                items: [],
                key: `entry-${this.entries.length}`,
                totalAmount: 0,
                totalDiscount: 0,
                grandTotalAmount: 0,
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
            const items = [];
            const entriesData = [];

            for (const entry of this.entries) {
                items.push(...entry.items);
                entriesData.push({
                    name: entry.name,
                    description: entry.description,
                    solution: entry.solution,
                    filesIds: entry.filesIds,
                    filesNames: entry.filesNames,
                    ids: entry.items.map(item => item.entryKey),
                    totalAmount: entry.totalAmount,
                    totalDiscount: entry.totalDiscount,
                    grandTotalAmount: entry.grandTotalAmount,
                });
            }

            return {
                itemsRecordList: Espo.Utils.cloneDeep(items),
                salesOrderEntryData: Espo.Utils.cloneDeep(entriesData),
            };
        }
    };
});
