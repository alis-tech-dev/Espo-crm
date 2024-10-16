extend(Dep => {
	return Dep.extend({
		// stores seed collections for each link
		_relatedCollectionTemplates: {},

		// stores all related attributes for each link
		_relatedModelDefs: {},

		_linkScopeMap: {},

		_relatedAttributesCache: {},

		_relatedModelsCache: {},

		_convertLayout: function (listLayout, model) {
			const layout = Dep.prototype._convertLayout.call(this, listLayout, model),
				listLayoutObj = {};

			if (model) {
				return layout;
			}

			listLayout.forEach(function (item) {
				listLayoutObj[item.name] = item;
			});

			layout.forEach(item => {
				const columnName = item.columnName;

				if (columnName.includes('.')) {
					const parts = columnName.split('.'),
						link = parts[0],
						field = parts[1],
						templateModel = new this._relatedCollectionTemplates[link].model(),
						type = templateModel.getFieldType(field) || 'base';

					// suffix 'Related' ensures that the name is always unique
					item.name = item.name.replace('.', '_') + 'Related';
					item.view = templateModel.getFieldParam(field, 'view') || this.getFieldManager().getViewName(type);
					item.options.labelText = this.translate(field, 'fields', templateModel.name);
				}

				if (columnName in listLayoutObj) {
					item.options.listEditDisabled = !listLayoutObj[columnName].isEditable;
				}
			});

			return layout;
		},

		// `getSelectAttributeList` is called usually called in parent view, and it sets collection's select attribute list
		// we need to ensure that related field's id is always selected
		getSelectAttributeList: function (callback) {
			const newCallback = attributeList => {
				const attributeSet = new Set(attributeList);
				Object.keys(this._relatedModelDefs).forEach(link => {
					const attributeName = link + 'Id';
					if (!attributeSet.has(attributeName)) {
						attributeList.push(attributeName);
					}
				});
				callback(attributeList);
			};

			Dep.prototype.getSelectAttributeList.call(this, newCallback);
		},

		_loadListLayout: function (callback) {
			Dep.prototype._loadListLayout.call(this, listLayout => {
				const promiseList = [];

				listLayout.forEach(item => {
					if (item.name.includes('.')) {
						const parts = item.name.split('.'),
							link = parts[0],
							field = parts[1];

						if (!this._relatedCollectionTemplates[link]) {
							const relatedEntityType = this.getMetadata().get([
								'entityDefs',
								this.scope,
								'links',
								link,
								'entity',
							]);

							this._linkScopeMap[link] = relatedEntityType;
							this._relatedModelDefs[link] = [];

							if (!relatedEntityType) {
								return;
							}

							promiseList.push(
								new Promise(resolve => {
									this.getCollectionFactory().create(
										relatedEntityType,
										function (collection) {
											this._relatedCollectionTemplates[link] = collection;
											resolve();
										},
										this,
									);
								}),
							);
						}

						this._relatedModelDefs[link].push(field);
					}
				});

				Promise.all(promiseList).then(() => {
					callback(listLayout);
				});
			});
		},

		buildRows: function (callback) {
			if (this.collection.length <= 0) {
				Dep.prototype.buildRows.call(this, callback);

				return;
			}

			this.wait(true);

			this.loadRelatedModels(null, () => {
				Dep.prototype.buildRows.call(this, callback);
			});
		},

		loadRelatedModels: function (models, callback) {
			if (!models) {
				models = this.collection.models;
			}

			this.loadCollections(models, collections => {
				collections.forEach(collection => {
					collection.forEach(model => {
						if (model.id in this._relatedModelsCache) {
							this._relatedModelsCache[model.id].set(model.attributes);

							return;
						}

						this._relatedModelsCache[model.id] = model;
					});
				});

				models.forEach(model => this.prepareModel(model));

				if (typeof callback === 'function') {
					callback();
				}
			});
		},

		getAttributeListForLink: function (link) {
			if (this._relatedAttributesCache[link]) {
				return this._relatedAttributesCache[link];
			}

			const list = [];

			this._relatedModelDefs[link].forEach(field => {
				const linkScope = this._linkScopeMap[link],
					fieldType = this.getMetadata().get(['entityDefs', linkScope, 'fields', field, 'type']);

				if (!fieldType) {
					return;
				}

				this.getFieldManager()
					.getEntityTypeFieldAttributeList(linkScope, field)
					.forEach(attribute => {
						list.push(attribute);
					});
			});

			this._relatedAttributesCache[link] = list;
			return list;
		},

		loadCollections: function (models, callback) {
			const promiseList = [];
			const relatedCollections = [];

			for (const [link, collection] of Object.entries(this._relatedCollectionTemplates)) {
				const relatedIds = {};

				models.forEach(model => {
					const id = model.get(link + 'Id');

					if (id) {
						relatedIds[id] = true;
					}
				});

				const idList = Object.keys(relatedIds);

				if (!idList.length) {
					continue;
				}

				collection.where = [
					{
						type: 'in',
						field: 'id',
						value: idList,
					},
				];

				collection.data.select = this.getAttributeListForLink(link);
				collection.maxSize = 200;

				relatedCollections.push(collection);
				promiseList.push(collection.fetch());
			}

			Promise.all(promiseList).then(() => {
				callback(relatedCollections);
			});
		},

		prepareModel: function (model) {
			// defs might be shallow copied, which would cause a lot of weird bugs
			model.defs = Espo.Utils.cloneDeep(model.defs);

			Object.entries(this._relatedModelDefs).forEach(([link, fields]) => {
				const relatedId = model.get(link + 'Id');
				const relatedModel = this._relatedModelsCache[relatedId] || false;

				if (!relatedId || !relatedModel) {
					return;
				}

				fields.forEach(field => {
					model.defs.fields[link + '.' + field] = relatedModel.defs.fields[field];
					model.defs.links[link + '.' + field] = relatedModel.defs.links[field];
				});

				const setAttributes = (attributes, o) => {
					const relatedAttributes = this.getAttributeListForLink(link);
					const attrs = {};

					Object.entries(attributes).forEach(([field, val]) => {
						if (relatedAttributes.includes(field)) {
							attrs[link + '.' + field] = val;
						}
					});

					// set the related attributes back to the model
					model.set(attrs, o);
				};

				// when `relatedModel` is fetched or saved
				this.listenTo(relatedModel, 'change', (relatedModel, o) => {
					setAttributes(relatedModel.changedAttributes(), o);
				});

				setAttributes(relatedModel.getClonedAttributes());
			});

			const orgSync = model.sync;

			// it's more practical to extend `model.sync()` and not `model.save()`, however it doesn't really matter that much
			model.sync = (method, model, options) => {
				if (!['create', 'patch', 'update'].includes(method)) {
					return orgSync.call(model, method, model, options);
				}

				const attrs = Espo.Utils.clone(options.attrs || model.attributes),
					relatedModelsAttrs = {};

				Object.entries(attrs).forEach(([key, value]) => {
					if (key.includes('.')) {
						const parts = key.split('.'),
							link = parts[0],
							field = parts[1];

						(relatedModelsAttrs[link] || (relatedModelsAttrs[link] = {}))[field] = value;
						delete attrs[key];
					}
				});

				options.attrs = attrs;
				const deferredList = [];

				if (Object.keys(options.attrs).length !== 0) {
					deferredList.push(orgSync.call(model, method, model, options));
				}

				Object.entries(relatedModelsAttrs).forEach(([link, attrs]) => {
					deferredList.push(this._relatedModelsCache[model.get(link + 'Id')].save(attrs, { patch: true }));
				});

				return $.when(...deferredList);
			};
		},

		showMoreRecords: function (options, collection, $list, $showMore, callback) {
			const orgFunction = Dep.prototype.showMoreRecords;

			if (orgFunction.length === 4) {
				callback = $showMore;
				$showMore = $list;
				$list = collection;
				collection = options;
			}

			collection = collection || this.collection;

			const initialCount = collection.length;

			const newCallback = () => {
				this.loadRelatedModels(collection.models.slice(initialCount), callback);
			};

			if (orgFunction.length === 4) {
				return orgFunction.call(this, collection, $list, $showMore, newCallback);
			}

			return orgFunction.call(this, options, collection, $list, $showMore, newCallback);
		},

		_getHeaderDefs: function () {
			const defs = Dep.prototype._getHeaderDefs.call(this);
			defs.forEach(def => {
				if (def.name && def.name.includes('.')) {
					if (this.getLanguage().has(def.name, 'relatedFields', this.collection.entityType)) {
						def.label = this.translate(def.name, 'relatedFields', this.collection.entityType);
					} else if (!def.hasCustomLabel) {
						const parts = def.name.split('.'),
							link = parts[0],
							field = parts[1],
							linkScope = this._linkScopeMap[link];

						def.label =
							this.translate(link, 'links', this.collection.entityType) +
							' > ' +
							this.translate(field, 'fields', linkScope);
					}
				}
			});

			return defs;
		},
	});
});
