extend(['autocrm:helpers/partitioned-view'], (Dep, PartitionedViewHelper) => {
	return class extends Dep {
		recordPartitionedView = 'autocrm:views/record/partitioned';
		recordKanbanView = 'autocrm:views/record/kanban';
		recordGridView = 'autocrm:views/record/grid';

		init() {
			super.init();

			this.partitionedViewHelper = new PartitionedViewHelper(
				this.scope,
				this.getStorage(),
				this.getFieldManager(),
			);
		}

		getRecordViewName() {
			let viewName = this.getMetadata().get(['clientDefs', this.scope, 'recordViews', this.viewMode]);

			if (viewName) {
				return viewName;
			}

			if (this.viewMode === this.MODE_LIST) {
				return this.recordView;
			}

			if (this.viewMode === this.MODE_KANBAN) {
				return this.recordKanbanView;
			}

			if (this.viewMode === 'grid') {
				return this.recordGridView;
			}

			let propertyName = 'record' + Espo.Utils.upperCaseFirst(this.viewMode) + 'View';

			viewName = this[propertyName];

			if (!viewName) {
				throw new Error('No record view.');
			}

			return viewName;
		}

		setupModes() {
			super.setupModes();

			const allowPartitioned = this.getMetadata().get(
				['clientDefs', this.collection.name, 'partitionedViewMode'],
				false,
			);

			const allowGrid = this.getMetadata().get(['clientDefs', this.collection.name, 'gridViewMode'], false);

			if (allowPartitioned) {
				this.viewModeList.push('partitioned');
			}

			if (allowGrid) {
				this.viewModeList.push('grid');
			}

			if (this.viewModeList.length > 1) {
				const modeKey = 'listViewMode' + this.scope;

				if (this.getStorage().has('state', modeKey)) {
					const storedViewMode = this.getStorage().get('state', modeKey);

					if (storedViewMode === 'partitioned' && allowPartitioned) {
						this.viewMode = 'partitioned';
					} else if (storedViewMode === 'grid' && allowGrid) {
						this.viewMode = 'grid';
					}
				}
			}
		}

		setViewModePartitioned() {
			const by = this.partitionedViewHelper.getActiveOption();

			this.collection.maxSize = this.getConfig().get('recordsPerPageSmall');
			this.collection.url = this.collection.name + '/partition/' + by;
			this.collection.partitionBy = by;
		}
	};
});
