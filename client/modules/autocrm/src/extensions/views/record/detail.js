extend(Dep => {
	return Dep.extend({
		customLayoutTypes: ['tab', 'record'],

		setup: function () {
			Dep.prototype.setup.call(this);

			const clientDefs = this.getMetadata().get(['clientDefs', this.scope], {});

			if (!('isWide' in this.options)) {
				if (clientDefs && 'isWide' in clientDefs) {
					this.isWide = clientDefs.isWide;
				} else if (this.getConfig().get('defaultIsWide')) {
					this.isWide = true;
				}
			}

			if (this.type === 'editSmall' || this.type === 'detailSmall') {
				return;
			}

			// Deprecated TODO: remove
			if (!('gridLayoutType' in this.options)) {
				if ('gridLayoutType' in clientDefs) {
					this.gridLayoutType = clientDefs.gridLayoutType;
				}
			} else {
				this.gridLayoutType = this.options.gridLayoutType;
			}

			this.gridLayoutType = this.gridLayoutType || this.getConfig().get('defaultDetailLayout');

			if (this.customLayoutTypes.includes(this.gridLayoutType)) {
				this.gridLayoutType = 'autocrm:' + this.gridLayoutType;
			}
		},

		convertDetailLayout: function (simplifiedLayout) {
			const layout = Dep.prototype.convertDetailLayout.call(this, simplifiedLayout);

			layout.forEach(function (panel, _p) {
				panel.css = simplifiedLayout[_p].css || 'col-md-12';

				panel.rows.forEach(function (rowCells, _r) {
					const defaultCol = 12 / rowCells.length;

					rowCells.forEach(function (cell, _c) {
						const cellDefs = simplifiedLayout[_p].rows[_r][_c] || {};
						cell.css = cellDefs.css || (cellDefs.fullWidth ? 'col-md-12' : 'col-md-' + defaultCol);

						if ('color' in cellDefs) {
							cell.color = cellDefs.color;
						}
						if ('horizontalLabel' in cellDefs) {
							cell.horizontalLabel = cellDefs.horizontalLabel;
						}

						cell.bold = cellDefs.bold;
					});
				});

				panel.index = simplifiedLayout[_p].index;

				if (panel.index === undefined) {
					panel.index = _p;
				}
			});

			layout.sort((a, b) => a.index - b.index);
			return layout;
		},

		afterRender: function () {
			Dep.prototype.afterRender.call(this);

			this.getGridLayout(grid => {
				(grid.layout || []).forEach(panel => {
					panel.rows.forEach(row => {
						row.forEach(this.processCell.bind(this));
					});
				});
			});

			if (this.gridLayoutType === 'autocrm:tab' && this.hasView('bottom')) {
				const firstPanel = this.getView('bottom').$el.children('.panel').first();

				if (firstPanel.length && firstPanel.hasClass('sticked')) {
					firstPanel.removeClass('sticked');
				}
			}
		},

		processCell: function (cell) {
			if (!cell) {
				return;
			}

			const view = this.getFieldView(cell.field);

			if (!view) {
				return;
			}

			const css = {};

			if ('color' in cell) {
				css.color = cell.color;
			}

			if (cell.bold) {
				css['font-weight'] = 'bold';
			}

			if (cell.css) {
				// use get$cell if available, otherwise fall back to old getCellElement
				const $cell = typeof view.get$cell === 'function' ? view.get$cell() : view.getCellElement();

				$cell.addClass(cell.css);
			}

			view.$el.css(css).find('input, select, a').css(css);

			if (css.color) {
				view.on('after:render', () => {
					view.$el.css(css).find('input, select, a').css(css);
				});
			}
		},
	});
});
