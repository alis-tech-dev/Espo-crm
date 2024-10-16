extend(Dep => {
	return class extends Dep {
		// only 1-N relations make sense for a list view in panel
		allowedLinks = ['hasMany', 'hasChildren'];

		readDataFromLayout(layout) {
			super.readDataFromLayout(layout);

			const parentLinks = this.getMetadata().get(['entityDefs', this.scope, 'links']) || {};

			for (const link in parentLinks) {
				const parentLinkDef = parentLinks[link];
				// `layoutRelationshipsDisabled` check is optional, however without it there's too many unlikely options, which are bad for the UX
				if (
					!this.allowedLinks.includes(parentLinkDef.type) ||
					parentLinkDef.disabled ||
					parentLinkDef.layoutRelationshipsDisabled
				) {
					return;
				}

				const scope = parentLinkDef.entity;
				const nestedLinks = this.getMetadata().get(['entityDefs', scope, 'links']) || {};

				for (const panel in nestedLinks) {
					const linkDef = nestedLinks[panel],
						panelName = link + '.' + panel;
					// these are the actual panels, so the `layoutRelationshipsDisabled` check is important
					if (
						this.allowedLinks.includes(linkDef.type) &&
						!linkDef.disabled &&
						!linkDef.layoutRelationshipsDisabled
					) {
						const layoutPanel = layout[panelName];
						const panelData = {
							name: panelName,
							label:
								this.translate(link, 'links', this.scope) +
								' > ' +
								(this.translate(panel, 'links', scope) || this.translate(panel, 'panels', scope)),
						};

						if (!layoutPanel || layoutPanel.disabled) {
							this.disabledFields.push(panelData);
						} else {
							for (const attribute in this.dataAttributesDefs) {
								if (attribute === 'name') {
									return;
								}

								if (attribute in linkDef) {
									panelData[attribute] = linkDef[attribute];
								}
							}
							for (const i in layoutPanel) {
								panelData[i] = layoutPanel[i];
							}
							this.rowLayout.push(panelData);
							this.itemsData[panelData.name] = Espo.Utils.cloneDeep(panelData);
						}
					}
				}
			}

			this.rowLayout.sort(function (v1, v2) {
				return (v1.index || 0) - (v2.index || 0);
			});
		}

		isBottomPanel(attributes) {
			return !attributes.noLayout && attributes.name !== 'stream' && !this.isTabName(attributes.name);
		}

		getEditAttributesModalViewOptions(attributes) {
			const options = super.getEditAttributesModalViewOptions(attributes);

			if (this.isBottomPanel(attributes)) {
				options.attributeList.push('layout');
				options.attributeList.push('filtersEnabled');

				options.attributeDefs.layout = {
					type: 'enum',
					translation: 'Admin.layouts',
					options: this.getLinkLayouts(attributes.name),
				};
				options.attributeDefs.filtersEnabled = {
					type: 'bool',
				};
			}

			return options;
		}

		getLinkLayouts(linkName) {
			let foreignScope;

			if (linkName.includes('.')) {
				const parts = linkName.split('.'),
					parentLink = parts[0],
					childrenLink = parts[1];

				const parentScope = this.getMetadata().get(['entityDefs', this.scope, 'links', parentLink, 'entity']);
				foreignScope = this.getMetadata().get(['entityDefs', parentScope, 'links', childrenLink, 'entity']);
			} else {
				foreignScope = this.getMetadata().get(['entityDefs', this.scope, 'links', linkName, 'entity']);
			}
			const additionalLayouts = this.getMetadata().get(['clientDefs', foreignScope, 'additionalLayouts']) || [];

			const options = ['listSmall', 'list'];
			for (const key in additionalLayouts) {
				if (['list', 'listSmall'].includes(additionalLayouts[key].type)) {
					options.push(key);
				}
			}

			return options;
		}
	};
});
