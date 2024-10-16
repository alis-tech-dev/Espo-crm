extend(['model'], Dep => {
	return Dep.extend({
		dataAttributeList: ['name', 'customLabel', 'noLabel', 'color', 'bold', 'css', 'horizontalLabel'],

		dataAttributesDefs: {
			name: {
				readOnly: true,
			},
			customLabel: {
				type: 'varchar',
			},
			noLabel: {
				type: 'bool',
			},
			color: {
				type: 'varchar',
				view: 'views/fields/colorpicker',
			},
			bold: {
				type: 'bool',
			},
			css: {
				type: 'varchar',
			},
			horizontalLabel: {
				type: 'bool',
			},
		},

		setup: function () {
			this.setupEvents();

			Dep.prototype.setup.call(this);
		},

		setupEvents: function () {
			this.events['click #layout a[data-action="editField"]'] = e => {
				const $li = $(e.target).closest('li');
				const attributes = {};

				this.dataAttributeList.forEach(attr => {
					let value = null;

					if (attr === 'name') {
						value = this.translate($li.data('name'), 'fields', this.scope);
					} else {
						value = $li.data(Espo.Utils.toDom(attr));
					}

					attributes[attr] = value || null;
				});

				this.createView(
					'dialog',
					'autocrm:views/admin/layouts/modals/cell-attributes',
					{
						attributeList: this.dataAttributeList,
						attributeDefs: this.dataAttributesDefs,
						attributes: attributes,
					},
					view => {
						view.render();

						this.listenTo(view, 'after:save', attributes => {
							// because customLabel has special logic in the base fetch method (Yuri moment)
							if (attributes.customLabel) {
								$li.attr('data-custom-label', attributes.customLabel);
							} else {
								$li.removeAttr('data-custom-label');
							}

							delete attributes.name;
							delete attributes.customLabel;

							this.dataAttributeList.forEach(attr => {
								if (attr in attributes) {
									$li.data(Espo.Utils.toDom(attr), attributes[attr]);
								}
							});

							view.close();
							this.setIsChanged();
						});
					},
				);
			};
		},

		createPanelView: function (data, empty, callback) {
			const createViewOrg = this.createView;

			data.rows.forEach(row => {
				row.forEach(cell => {
					cell.dataAttributes = this.dataAttributeList.filter(attr => cell[attr]);
				});
			});

			this.createView = function (name, view, options, callback) {
				options.template = 'autocrm:admin/layouts/grid-panel';

				createViewOrg.call(this, name, view, options, callback);
			};

			Dep.prototype.createPanelView.call(this, data, empty, callback);

			this.createView = createViewOrg;
		},
	});
});
