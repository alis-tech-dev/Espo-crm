extend(Dep => {
	return Dep.extend({
		init: function () {
			Dep.prototype.init.call(this);

			if (!this.buttonList.some(button => button.name === 'addRelatedField')) {
				this.buttonList.push({
					name: 'addRelatedField',
					label: 'Add Related Field',
				});
			}

			if (!this.dataAttributeList.includes('isEditable')) {
				this.dataAttributeList.push('isEditable');
			}
		},

		setup: function () {
			this.events['click button[data-action="addRelatedField"]'] = () => this.openAddFieldDialog();
			this.dataAttributesDefs.isEditable = {
				type: 'bool',
				default: false,
				tooltip: true,
			};

			Dep.prototype.setup.call(this);
		},

		readDataFromLayout: function (model, layout) {
			Dep.prototype.readDataFromLayout.call(this, model, layout);

			// related fields need to be translated
			this.translateRowLayout();
		},

		openAddFieldDialog: function () {
			const currentLayout = this.fetch();
			this.createView(
				'modal',
				'autocrm:views/admin/layouts/modals/add-related-field',
				{
					scope: this.scope,
					enabledFields: currentLayout,
				},
				view => {
					view.render();

					this.listenToOnce(view, 'add-field', (attributeName, attributeNameTranslated) => {
						// reRender creates the view again, so we need to save the current layout
						this.rowLayout = currentLayout;

						// currentLayout is missing labels, so we need to translate it
						this.translateRowLayout();

						const newRow = {
							label: attributeNameTranslated,
							name: attributeName,
							customLabel: attributeNameTranslated,
							notSortable: true,
						};
						this.rowLayout.push(newRow);
						this.itemsData[attributeName] = Espo.Utils.cloneDeep(newRow);

						view.close();
						this.reRender();
						this.setIsChanged();
					});
				},
			);
		},

		translateLabel: function (name) {
			// only related fields include `.` in the name
			if (name.includes('.')) {
				const field = name.split('.')[1];
				const link = name.split('.')[0];
				const linkScope = this.getMetadata().get('entityDefs.' + this.scope + '.links.' + link + '.entity');
				return this.translate(link, 'links', this.scope) + ' > ' + this.translate(field, 'fields', linkScope);
			} else {
				return this.translate(name, 'fields', this.scope);
			}
		},

		translateRowLayout: function () {
			for (const i in this.rowLayout) {
				this.rowLayout[i].label = this.translateLabel(this.rowLayout[i].name);
			}
		},
	});
});
