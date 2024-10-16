define(['views/fields/link-multiple', 'views/record/base'], (Dep, RecordBase) => {
	return Dep.extend({
		detailTemplate: 'autocrm:fields/link-multiple/detail',

		editTemplate: 'autocrm:fields/link-multiple/edit',

		recordListEnabled: false,

		recordListLayout: 'listSmall',

		recordListView: 'autocrm:views/fields/link-multiple/record-list',

		seed: null,

		collection: null,

		validations: ['required', 'recordList'],

		plusIconClass: 'fas fa-plus',

		linkIconClass: 'fas fa-link',

		init: function() {
			Dep.prototype.init.call(this);

			// prevents setting 'has-error' class thus making all record view fields (including valid ones) red
			this.off('invalid');

			this._processOption('defaultSelectFilters', {});
			this._processOption('recordListEnabled');
			this._processOption('recordListCreateDisabled');
			this._processOption('recordListLinkDisabled');
			this._processOption('recordListRemoveDisabled');
			this._processOption('recordListConfirmRemove');
			this._processOption('recordListOrderByField');
			this._processOption('recordListLayout');
			this._processOption('recordListDynamicHandler', null);
			this._processOption('recordListButtonsPosition', 'Bottom');
		},

		_processOption: function(key, def) {
			this[key] =
				this.options[key] || this.params[key] || this[key] || def;
		},

		setup: function() {
			Dep.prototype.setup.call(this);

			if (this.isSearchMode() || this.isListMode()) {
				this.recordListEnabled = false;
			}

			if (!this.recordListEnabled) {
				return;
			}

			this.setupEvents();

			// selector might differ across different Espo versions
			const key = Object.keys(this.events).find(key => key.includes('[data-action="selectLink"]'));

			delete this.events[key];
		},

		setupEvents: function() {
			this.events['click [data-action="addItem"]'] = () => {
				if (this.createAsModal) {
					this.createRelated();
				} else {
					this.addItem();
				}
			};

			this.events['click [data-action="linkItems"]'] = () => this.linkItems();
		},

		createRelated: function() {
			const viewName =
				this.getMetadata().get(['clientDefs', this.foreignScope, 'modalViews', 'edit']) || 'views/modals/edit';

			this.createView(
				'quickCreate',
				viewName,
				{
					scope: this.foreignScope,
				},
				view => {
					view.actionSave = function() {
						this.trigger('after:save', this.getRecordView().model);

						this.dialog.close();
					};

					view.render();
					view.notify(false);

					this.listenToOnce(view, 'after:save', model => {
						this.addItem(model.attributes);
					});
				},
			);
		},

		afterRender: function() {
			if (!this.recordListEnabled) {
				Dep.prototype.afterRender.call(this);
			}
		},

		onEditModeSet: function() {
			if (this.recordListEnabled && this.collection && this.recordListOrderByField) {
				this.collection.orderByDefaultOrder();
			}

			return Dep.prototype.onEditModeSet.call(this);
		},

		onDetailModeSet: function() {
			if (this.recordListEnabled && this.collection && this.recordListOrderByField) {
				this.collection.resetOrderToDefault();
			}

			return Dep.prototype.onDetailModeSet.call(this);
		},

		prepare: function() {
			if (!this.recordListEnabled) {
				return Dep.prototype.prepare.call(this);
			}

			return this.prepareSeedModel()
				.then(() => {
					return this.prepareCollection();
				})
				.then(() => {
					return this.loadCollectionModels();
				})
				.then(() => {
					return this.prepareRecordListView();
				});
		},

		initInlineEdit: function() {
			Dep.prototype.initInlineEdit.call(this);

			this.get$cell().children('.inline-edit-link').addClass('link-multiple-inline-edit');
		},

		getSelectFilters: function() {
			return this.defaultSelectFilters || this.getFieldParamValue('defaultSelectFilters') || {};
		},

		validateRecordList: function() {
			if (!this.recordListEnabled) {
				return false;
			}

			return this.getView('list').validate();
		},

		validateRequired: function() {
			if (!this.recordListEnabled) {
				return Dep.prototype.validateRequired.call(this);
			}

			if (this.isRequired()) {
				let value = this.getRecordList();

				if (!value || value.length === 0) {
					let msg = this.translate('fieldIsRequired', 'messages').replace('{field}', this.getLabelText());

					this.showValidationMessage(msg, '.recordList');

					return true;
				}
			}

			return false;
		},

		prepareSeedModel: function() {
			if (this.seed) {
				return Promise.resolve(this.seed);
			}

			return new Promise(resolve => {
				this.getModelFactory().create(this.foreignScope, model => {
					this.seed = model;
					resolve(model);
				});
			});
		},

		prepareCollection: function() {
			if (this.collection) {
				return Promise.resolve(this.collection);
			}

			return new Promise(resolve => {
				this.getCollectionFactory().create(this.foreignScope, collection => {
					const orgFetch = collection.fetch;

					this.collection = collection;
					this.collection.parentModel = this.model;
					this.collection.fetch = options => {
						if (this.model.isNew()) {
							return Promise.resolve();
						}

						const url = 'RecordList/' + this.model.name + '/' + this.model.id + '/' + this.name;
						this.collection.url = this.collection.urlRoot = url;

						return orgFetch.call(this.collection, options);
					};

					if (this.recordListOrderByField) {
						this.collection.orderBy = this.collection.defaultOrderBy = this.recordListOrderByField;
						this.collection.order = this.collection.defaultOrder = 'asc';

						this.collection.orderByDefaultOrder = () => {
							this.collection.models.sort((modelA, modelB) => {
								const orderA = modelA.get(this.recordListOrderByField);
								const orderB = modelB.get(this.recordListOrderByField);

								return orderA - orderB;
							});
						};
					}

					resolve(this.collection);
				});
			});
		},

		prepareRecordListView: function(options) {
			options = options || {};

			if (this.hasView('list') && this.getView('list').isBeingRendered()) {
				return;
			}

			options = _.extend(options, {
				collection: this.collection,
				selector: '.recordList',
				layoutName: this.recordListLayout,
				mode: this.isEditMode() ? 'edit' : 'list',
				rowActionsDisabled: this.isEditMode(),
				removeActionDisabled: this.recordListRemoveDisabled,
				confirmRemove: this.recordListConfirmRemove,
				dynamicHandlerClassName: this.recordListDynamicHandler,
				seed: this.seed,
				mandatorySelectAttributeList:
					this.params.recordListManadatorySelectAttributeList ||
					this.recordListManadatorySelectAttributeList ||
					null,
				showMore: true,
				recordList: true,
				checkboxes: this.params.checkboxesEnabled || false,
				recordListOrderByField: this.recordListOrderByField,
				link: this.name,
				parentId: this.model.id,
				parentEntityType: this.model.name,
			});

			this.prepareRecordListViewOptions(options);

			return this.createView('list', this.recordListView, options).then(view => {
				this.listenTo(view, 'change', () => {
					this.trigger('change');
				});

				return view;
			});
		},

		/**
		 * To be extended
		 *
		 * @protected
		 * @param {object} options
		 */
		// eslint-disable-next-line no-unused-vars
		prepareRecordListViewOptions: function(options) { },

		loadCollectionModels: function() {
			const recordList = this.getRecordList() || [];

			this.collection.reset(null, { silent: true });

			recordList.forEach(data => {
				this.addItem(data, true);
			});

			this.collection.total = recordList.length;
		},

		data: function() {
			const data = Dep.prototype.data.call(this);

			data.recordListEnabled = this.recordListEnabled;
			data.recordListCreateDisabled = this.recordListCreateDisabled;
			data.recordListLinkDisabled = this.recordListLinkDisabled;
			data.plusIconClass = this.plusIconClass;
			data.linkIconClass = this.linkIconClass;
			data.recordListButtonsPosition = this.recordListButtonsPosition;

			return data;
		},

		/**
		 * @param {object|null} data
		 * @param {boolean} silent
		 * @returns {module:model.Class}
		 */
		addItem: function(data = null, silent = false) {
			const model = this.seed.clone();

			if (data) {
				model.set(data);
			} else {
				this.populateModel(model);
			}

			if (!model.id) {
				model.id = 'cid' + Math.random().toString(36).substring(2, 10);
			}

			switch (this.recordListButtonsPosition) {
				case 'Top':
					this.collection.unshift(model, { silent: silent });
					break;
				case 'Bottom':
				default:
					this.collection.add(model, { silent: silent });
					break;
			}

			if (!silent) {
				this.collection.trigger('add-item', model);
				this.trigger('change');
			}

			return model;
		},

		/**
		 * To be extended
		 *
		 * @param {object} attributes
		 * @returns {object}
		 */
		processLinkedModelAttributes: function(attributes) {
			return attributes;
		},

		linkItems: function() {
			this.notify('Loading...');

			const viewName =
				this.params.modalView ||
				this.getMetadata().get(['clientDefs', this.foreignScope, 'modalViews', 'select']) ||
				this.selectRecordsView;

			this.createView(
				'dialog',
				viewName,
				{
					scope: this.foreignScope,
					parentModel: this.model,
					createButton: !this.createDisabled && this.mode !== 'search',
					filters: this.getSelectFilters(),
					boolFilterList: this.getSelectBoolFilterList(),
					primaryFilterName: this.getSelectPrimaryFilterName(),
					filterList: this.getSelectFilterList(),
					multiple: true,
					mandatorySelectAttributeList: this.mandatorySelectAttributeList,
					forceSelectAllAttributes: true,
				},
				dialog => {
					dialog.render();

					this.notify(false);

					this.listenToOnce(dialog, 'select', models => {
						this.clearView('dialog');

						if (!_.isArray(models)) {
							models = [models];
						}

						models = models.filter(model => {
							return !this.collection.has(model.id);
						});

						if (!models.length) {
							return;
						}

						const collectionModels = [];

						models.forEach(model => {
							const attributes = this.processLinkedModelAttributes(model.getClonedAttributes());

							collectionModels.push(this.addItem(attributes, true));
						});

						this.collection.trigger('add-items', collectionModels);
						this.trigger('change');
					});
				},
			);
		},

		populateModel: function(model) {
			if (this.recordListOrderByField) {
				model.set(this.recordListOrderByField, this.collection.length + 1);
			}

			const thisModel = this.model;
			const context = this;

			// Change `this.model` for `populationDefaults`
			context.model = model;
			RecordBase.prototype.populateDefaults.call(context);

			// Restore the original model (since context is copied by reference)
			this.model = thisModel;
		},

		getRecordList: function() {
			return this.model.get(this.name + 'RecordList');
		},

		fetch: function() {
			if (!this.recordListEnabled) {
				return Dep.prototype.fetch.call(this);
			}

			const data = {};

			if (this.getView('list')) {
				data[this.name + 'RecordList'] = this.getView('list').fetch();
			}

			return data;
		},
	});
});
