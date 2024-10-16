define(['views/record/list'], Dep => {
	return class extends Dep {
		/* jshint ignore:start */
		mode = 'list';

		removeRowActionWidth = 25;

		removeActionDisabled = false;

		confirmRemove = false;

		sortRowActionWidth = 25;

		recordListOrderByField = null;

		dynamicHandlerClassName = null;

		_DynamicHandler = null;

		_modelListeners = {};

		pagination = false;

		buttonsDisabled = true;

		showCount = false;

		/* jshint ignore:end */

		init() {
			super.init();

			this.mode = this.options.mode || this.mode;
		}

		setup() {
			super.setup();

			this.seed = this.options.seed;
			this.removeActionDisabled = this.options.removeActionDisabled || this.removeActionDisabled;
			this.confirmRemove = this.options.confirmRemove || this.confirmRemove;
			this.dynamicHandlerClassName = this.dynamicHandlerClassName || this.options.dynamicHandlerClassName;
			this.recordListOrderByField = this.options.recordListOrderByField || this.recordListOrderByField;

			if (this.dynamicHandlerClassName) {
				this.wait(
					Espo.loader.requirePromise(this.dynamicHandlerClassName).then(handler => {
						this._DynamicHandler = handler;
					}),
				);
			}

			this.listenTo(this.collection, 'add-item add-items', models => {
				if (!Array.isArray(models)) {
					models = [models];
				}

				this.addRecordsToList(models);
			});

			this.listenTo(this.collection, 'change', () => this.trigger('change'));

			this.on('after:save', () => {
				this.trigger('change');
			});
		}

		addRecordsToList(models) {
			if (this.rowList.length === 0) {
				this.buildRows(() => {
					this.render();
				});

				return;
			}

			const $list = this.$el.find(this.listContainerEl);

			models.forEach(model => {
				this.buildRow(0, model, view => {
					view.getHtml(html => {
						const $row = $(this.getRowContainerHtml(model.id));

						$row.append(html);
						$list.append($row);

						setTimeout(() => {
							if (view.options.el) {
								view.setElement(view.options.el);
							}

							view._afterRender();
						}, 0);
					});
				});
			});
		}

		afterRender() {
			super.afterRender();

			this.$el.children('.list').toggleClass('edit-mode', this.isEditMode());

			this.setupSortableRecordList();
		}

		isEditMode() {
			return this.mode === 'edit';
		}

		setupSortableRecordList() {
			if (!this.recordListOrderByField) {
				return;
			}

			if (!this.isEditMode()) {
				return;
			}

			const $list = this.$el.find(this.listContainerEl);

			$list.sortable({
				axis: 'y',
				handle: '[data-action="sort"]',
				cancel: '',
				stop: () => this.updateOrder(),
			});
		}

		updateOrder() {
			const $list = this.$el.find(this.listContainerEl);
			const modelMap = new Map();

			this.collection.forEach(model => {
				modelMap.set(model.id, model);
			});

			$list.children('tr').each((i, item) => {
				const modelId = $(item).data('id');
				const model = modelMap.get(modelId);

				if (!model) {
					throw new Error(`Model with id ${modelId} not found`);
				}

				model.set(this.recordListOrderByField, i + 1);
			});

			this.collection.orderByDefaultOrder();

			this.trigger('change');
		}

		buildRow(i, model, callback) {
			super.buildRow(i, model, view => {
				this.fetchRowToCollection(view);
				this.initDynamicHandlerForRow(model, view);
				callback(view);
			});
		}

		initDynamicHandlerForRow(model, view) {
			if (!this._DynamicHandler) {
				return;
			}

			const dynamicHandler = new this._DynamicHandler(view, this, this.collection.parentModel);

			this.prepareDynamicHandlerObj(dynamicHandler);

			const previousCallback = this._modelListeners[model.id] || null;
			const callback = this._dynamicHandlerListener.bind(this, dynamicHandler);

			if (previousCallback) {
				this.stopListening(model, 'change', previousCallback);
			}

			this.listenTo(model, 'change', callback);

			this._modelListeners[model.id] = callback;

			dynamicHandler._rowRender();
		}

		/**
		 * To be extended.
		 *
		 * @protected
		 */
		// eslint-disable-next-line no-unused-vars
		prepareDynamicHandlerObj(dynamicHandler) {}

		_dynamicHandlerListener(dynamicHandler, model, o) {
			if ('onChange' in dynamicHandler) {
				dynamicHandler.onChange.call(dynamicHandler, model, o);
			}

			const changedAttributes = model.changedAttributes() || {};

			for (const attr in changedAttributes) {
				const methodName = 'onChange' + Espo.Utils.upperCaseFirst(attr);

				if (methodName in dynamicHandler) {
					dynamicHandler[methodName](model, changedAttributes[attr], o);
				}
			}
		}

		validate() {
			for (const row of this.rowList) {
				if (!this.hasView(row)) {
					continue;
				}

				const rowView = this.getView(row);

				for (const fieldView of Object.values(rowView.nestedViews)) {
					if (
						typeof fieldView.validate === 'function' &&
						fieldView.isEditMode() &&
						!fieldView.disabled &&
						!fieldView.readOnly &&
						fieldView.validate()
					) {
						return true;
					}
				}
			}

			return false;
		}

		_getHeaderDefs() {
			const headerDefs = super._getHeaderDefs(this);

			if (!this.isEditMode()) {
				return headerDefs;
			}

			const listLayoutMap = {};

			(this.listLayout || []).forEach(item => {
				listLayoutMap[item.name] = item;
			});

			headerDefs.forEach(def => {
				def.isSortable = false;

				const name = def.name;
				let required = this.seed.getFieldParam(name, 'required');

				if (listLayoutMap[name] && listLayoutMap[name].params && 'required' in listLayoutMap[name].params) {
					required = listLayoutMap[name].params.required;
				}

				if (required) {
					def.label += ' *';
				}
			});

			if (!this.removeActionDisabled) {
				headerDefs.push({
					className: 'remove-column',
					width: this.removeRowActionWidth + 'px',
				});
			}

			if (this.recordListOrderByField) {
				headerDefs.push({
					className: 'sort-column',
					width: this.sortRowActionWidth + 'px',
				});
			}

			return headerDefs;
		}

		getItemEl(model, item) {
			const el = super.getItemEl(model, item);

			return el + ' .cell-wrapper';
		}

		prepareInternalLayout(internalLayout, model) {
			super.prepareInternalLayout(internalLayout, model);

			internalLayout.forEach(item => {
				if (['buttons', 'removeCrossField', 'sortMagnetField'].includes(item.name)) {
					return;
				}

				if (this.isEditMode()) {
					if (!item.options) {
						item.options = {};
					}

					item.options.mode = 'edit';
				}

				item.tag = 'div';
				item.class = 'cell-wrapper';
			});
		}

		_convertLayout(listLayout, model) {
			const layout = super._convertLayout(listLayout, model);

			if (this.isEditMode()) {
				if (!this.removeActionDisabled) {
					layout.push({
						columnName: 'remove-cross',
						name: 'removeCrossField',
						view: 'autocrm:views/record/row-actions/remove-cross',
						options: {},
					});
				}

				if (this.recordListOrderByField) {
					layout.push({
						columnName: 'sort-magnet',
						name: 'sortMagnetField',
						view: 'autocrm:views/record/row-actions/sort-magnet',
						options: {},
					});
				}
			}

			return layout;
		}

		actionQuickRemove(data) {
			if (!this.isEditMode()) {
				super.actionQuickRemove(data);

				return;
			}

			const remove = () => {
				data = data || {};

				const id = data.id;

				if (!id) {
					return;
				}

				// need to use `find` instead of `get` because new models does not have `id` attribute (only `id` property)
				const model = this.collection.models.find(model => model.id === id);

				if (model) {
					this.collection.remove(model.cid);
					this.removeRecordFromList(id);
				}
			};

			if (this.confirmRemove) {
				this.confirm(this.translate('confirmation', 'messages'), remove);
			} else {
				remove();
			}
		}

		removeRecordFromList(id) {
			super.removeRecordFromList(id);

			this.trigger('change');
		}

		getViewFields(view) {
			return Object.values(view.nestedViews).filter(view => typeof view.fetch === 'function');
		}

		// Important, although it might not seem so at first glance.
		// It ensures that the proper attributes are set (e.g. for validation) even if no 'change' event is triggered,
		// for example, when user saves without editing any record list fields
		fetchRowToCollection(rowView) {
			if (!this.isEditMode()) {
				return;
			}

			this.listenToOnce(rowView, 'after:render', () => {
				for (const fieldView of this.getViewFields(rowView)) {
					if (fieldView.isEditMode() && fieldView.$el.length) {
						fieldView.fetchToModel();
					}
				}
			});
		}

		fetch() {
			return this.collection.models.map(model => model.getClonedAttributes());
		}

		getTableMinWidth() {
			let minWidth = super.getTableMinWidth();

			if (this.isEditMode()) {
				if (!this.removeActionDisabled) minWidth += this.removeRowActionWidth;
				if (this.recordListOrderByField) minWidth += this.sortRowActionWidth;
			}

			return minWidth;
		}
	};
});
