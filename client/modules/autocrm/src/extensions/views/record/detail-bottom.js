extend(Dep => {
	return Dep.extend({
		init: function () {
			Dep.prototype.init.call(this);

			if (this.getMetadata().get(['clientDefs', this.scope, 'bottomLayoutType']) === 'tab') {
				this.template = 'autocrm:record/bottom/tabs';
			}
		},

		// the only method we can hook to, that is called after the `this.layoutData` is set
		alterPanels: function (layoutData) {
			const links = (this.model.defs || {}).links,
				originalLinks = Espo.Utils.cloneDeep(links);

			if (links) {
				Object.keys(this.layoutData)
					.filter(name => name.includes('.'))
					.forEach(name => {
						if (this.layoutData[name].disabled) {
							return;
						}

						let linkName = name.split('.')[0];
						links[name] = {
							entity: this.getMetadata().get([
								'entityDefs',
								this.model.name,
								'links',
								linkName,
								'entity',
							]),
						};

						const obj = Espo.Utils.cloneDeep(this.layoutData[name]),
							safeName = name.replace('.', '_');
						obj.view = 'autocrm:views/record/panels/related-link';
						obj.link = name;
						obj.actionsViewKey = safeName;
						this.addRelationshipPanel(name, obj);

						// it is necessary to change the name, otherwise certain views (e.g. actions) won't be rendered
						const pushedPanel = this.panelList[this.panelList.length - 1];
						if (pushedPanel.name === name) {
							pushedPanel.name = safeName;
						}
					});
			}

			this.model.defs.links = originalLinks;
			Dep.prototype.alterPanels.call(this, layoutData);
		},
	});
});
