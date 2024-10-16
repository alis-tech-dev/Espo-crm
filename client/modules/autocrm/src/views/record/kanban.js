define(['views/record/kanban'], Dep => {
	return Dep.extend({
		template: 'autocrm:record/kanban',

		init() {
			Dep.prototype.init.call(this);
		},

		setup: function () {
			Dep.prototype.setup.call(this);
			this.setupEvents();

			this.layoutName = this.options.layoutName || this.layoutName;
			this.kanbanLayouts = this.getKanbanLayouts();
		},

		/**
		 * Nastaví události pro tlačítka, které mění kanban layout
		 * Tedy zachytava pozadavek na zmenu layoutu a vola funkci pro jeho provedeni
		 */
		setupEvents: function () {
			this.events['click [data-action="switchKanbanLayout"]'] = e => {
				const layoutName = $(e.currentTarget).data('name');
				this.switchKanbanLayout(layoutName);
			};
		},

		/**
		 * Vrátí data pro view, pridava se jen seznam layoutu, podle ktere se vykresluji tlacitka pro zmenu layoutu
		 * @returns {*&{kanbanLayouts: *}}
		 */
		data() {
			return {
				...Dep.prototype.data.call(this),
				kanbanLayouts: this.kanbanLayouts,
			};
		},

		/**
		 * Vrací seznam dostupných kanban layoutů + základní kanban layout
		 * @returns {(string|string)[]}
		 */
		getKanbanLayouts() {
    		    const layouts = this.getMetadata().get(['clientDefs', this.scope, 'additionalLayouts']);
    		    if (!layouts || typeof layouts !== 'object') {
        			return ['kanban'];
    		    }
    		    return ['kanban', ...Object.keys(layouts).filter(layout => layout.startsWith('kanban'))];
		},

		/**
		 * Změní kanban layout a znovu načte list
		 * @param layoutName
		 */
		switchKanbanLayout(layoutName) {
			console.log(
				'------------------------------------- switchKanbanLayout -------------------------------------',
			);
			console.log('switchKanbanLayout called with layoutName:', layoutName);
			console.log('switchKanbanLayout called with options:', this.options);
			this.getParentView().optionsToPass = ['layoutName', ...this.getParentView().optionsToPass];
			this.getParentView().options['layoutName'] = layoutName;
			this.getParentView().clearView('list');
			this.getParentView().loadList();
		},
	});
});
