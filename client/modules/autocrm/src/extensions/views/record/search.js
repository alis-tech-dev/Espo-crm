extend(
	['autocrm:helpers/aggregation', 'autocrm:helpers/partitioned-view', 'autocrm:models/aggregation'],
	(Dep, AggregationHelper, PartitionedViewHelper, AggregationModel) => {
		return Dep.extend({
			template: 'autocrm:record/search',

			selectedCustomFilter: null,

			setup: function () {
				this.setupEvents();
				this.setupViewModes();

				Dep.prototype.setup.call(this);

				this.aggregationHelper = new AggregationHelper(
					this.searchManager.type,
					this.model,
					this.getStorage(),
					this.getMetadata(),
					this._helper.layoutManager,
					this.getFieldManager(),
					this.getStorage(),
				);
				this.partitionedViewHelper = new PartitionedViewHelper(
					this.model,
					this.getStorage(),
					this.getFieldManager(),
				);

				this.wait(this.aggregationHelper.getAggregationDefs().then(defs => (this.aggregationDefs = defs)));

				this.aggregations = this.aggregationHelper.getActiveAggregationFunctions();
				this.aggregationModel = new AggregationModel();
				this.aggregationModel.setAggregationData(this.aggregations);
				this.aggregationModel.setSearchManager(this.searchManager);
				this.aggregationModel.setScope(this.scope);

				this.listenTo(this.collection, 'sync', () => {
					this.aggregationModel.fetch();
				});

				this.on('change-view-mode', this.controlPartitionVisibility, this);

				this.createFunctions();
			},

			setupEvents: function () {
				this.events['change select[data-name="partitionBy"]'] = e => {
					const by = e.target.value;

					this.partitionedViewHelper.saveActiveOption(by);
					this.loadPartition(by);
				};

				this.events['click a[data-action="addFunction"]'] = e => {
					const $target = $(e.currentTarget);
					const field = $target.data('field');
					const func = $target.data('function');

					$target.closest('li').addClass('hidden');

					this.addFunction(field, func);
				};

				this.events['click .aggregation-function-panel a.remove-function'] = e => {
					const $target = $(e.currentTarget);
					const name = $target.data('name');

					this.removeFunction(name);
				};

				this.events['click [data-action="selectPreset"]'] = e => {
					const name = $(e.currentTarget).data('name');

					if (name) {
						this.selectedCustomFilter = name;
						this.selectPreset(name);
					}
				};

				this.events['click a[data-action="removePreset"]'] = e => {
					const name = $(e.currentTarget).data('name');

					this.confirm(this.translate('confirmation', 'messages'), () => {
						this.removePreset(name);
					});
				};
			},

			selectPreset(presetName, forceClearAdvancedFilters) {
				const customFilters = this.getPreferences().get('presetFilters') ?? {};

				const isCustom = (customFilters[this.scope] || []).some(filter => filter.name === presetName);

				if (!isCustom) {
					this.selectedCustomFilter = null;
				}

				Dep.prototype.selectPreset.call(this, presetName, forceClearAdvancedFilters);
			},

			setupViewModes: function () {
				this.viewModeIconClassMap.partitioned = 'fas fa-solid fa-layer-group';
				this.viewModeIconClassMap.grid = 'fas fa-solid fa-th-large';
			},

			addFunction: function (field, func) {
				const name = field + '_' + func;

				this.aggregations[name] = {
					field: field,
					function: func,
					params: {},
				};

				this.saveAggregationFunctions();
				this.createFunction(name, field, func, () => {
					this.aggregationModel.fetch();
				});

				this.updateAddFunctionButton();
			},

			removeFunction: function (name) {
				this.$el.find('ul.function-list li[data-name="' + name + '"]').removeClass('hidden');

				const container = this.getView('function-' + name).$el.closest('div.function');

				this.clearView('function-' + name);

				container.remove();

				delete this.aggregations[name];
				this.saveAggregationFunctions();

				this.updateAddFunctionButton();
			},

			saveAggregationFunctions: function () {
				this.aggregationHelper.save(this.aggregations);
			},

			getCustomFilterList: function () {
				return (this.getPreferences().get('presetFilters') ?? {})[this.scope];
			},

			data: function () {
				return _.extend(
					{
						customFilterList: this.getCustomFilterList(),
						customFiltersAboveList: this.getPreferences().get('customFiltersAboveList') ?? false,
						aggregationFunctions: this.getAggregationDefs(),
						emptyAggregationFunctions: this.aggregationDefs.length === 0,
						functionDataList: this.getFunctionDataList(),
						partitionOptions: this.partitionedViewHelper.getOptions(),
						selectedPartition: this.partitionedViewHelper.getActiveOption(),
					},
					Dep.prototype.data.call(this),
				);
			},

			getAggregationDefs: function () {
				return this.aggregationDefs.map(def => {
					const name = def.field + '_' + def.function;
					return {
						field: def.field,
						function: def.function,
						checked: name in this.aggregations,
						name: name,
					};
				});
			},

			getFunctionDataList: function () {
				const data = [];

				Object.keys(this.aggregations).forEach(key => {
					data.push({
						key: 'function-' + key,
						name: key,
					});
				});

				return data;
			},

			createFunction: function (name, field, func, callback) {
				const rendered = this.isRendered();

				if (rendered) {
					this.$aggregationFunctionPanel.append(
						'<div class="function function-' + name + '" data-name="' + name + '"/>',
					);
				}

				this.createView(
					'function-' + name,
					'autocrm:views/search/aggregation-function',
					{
						el: this.options.el + ' .function[data-name="' + name + '"]',
						name: name,
						model: this.aggregationModel,
						entityType: this.entityType,
						field: field,
						function: func,
						aggregationHelper: this.aggregationHelper,
					},
					view => {
						if (typeof callback === 'function') {
							view.once('after:render', () => callback(view));
						}

						if (rendered) {
							view.render();
						}
					},
				);
			},

			createFunctions: function (callback) {
				let i = 0;
				const count = Object.keys(this.aggregations).length;

				if (count === 0) {
					if (typeof callback === 'function') {
						callback();
					}
					return;
				}

				Object.entries(this.aggregations).forEach(([name, aggregation]) => {
					this.createFunction(name, aggregation.field, aggregation.function, () => {
						i++;

						if (i === count && typeof callback === 'function') {
							callback();
						}
					});
				});
			},

			loadPartition: function (by) {
				this.collection.reset();

				this.collection.url = this.collection.name + '/partition/' + by;
				this.collection.partitionBy = by;

				this.notify('Loading...');

				this.collection.fetch().then(() => this.notify(false));
			},

			afterRender: function () {
				Dep.prototype.afterRender.call(this);

				this.$aggregationFunctionPanel = this.$el.find('.aggregation-function-panel');

				this.updateAddFunctionButton();
				this.controlPartitionVisibility(this.viewMode);

				const name = this.selectedCustomFilter;

				if (name) {
					this.$el.find(`.custom-filter-controls [data-name=${name}]`).addClass('active');
				}
			},

			controlPartitionVisibility: function (viewMode) {
				if (viewMode === 'partitioned') {
					this.$el.find('div.partition-container').removeClass('hidden');
				} else {
					this.$el.find('div.partition-container').addClass('hidden');
				}
			},

			updateAddFunctionButton: function () {
				let $ul = this.$el.find('ul.function-list');

				if ($ul.children().not('.hidden').not('.dropdown-header').length === 0) {
					this.$el.find('button.add-function-button').addClass('disabled');
				} else {
					this.$el.find('button.add-function-button').removeClass('disabled');
				}
			},
		});
	},
);
