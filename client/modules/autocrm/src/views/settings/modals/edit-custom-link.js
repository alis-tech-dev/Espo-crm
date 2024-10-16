define(['views/settings/modals/edit-tab-group', 'views/modal', 'model'], (Dep, Modal, Model) => {
	return Dep.extend({
		setup: function () {
			Modal.prototype.setup.call(this);

			this.headerHtml = this.translate('Custom Link', 'labels', 'Settings');

			this.buttonList.push({
				name: 'apply',
				label: 'Apply',
				style: 'danger',
			});

			this.buttonList.push({
				name: 'cancel',
				label: 'Cancel',
			});

			const detailLayout = [
				{
					rows: [
						[
							{
								name: 'text',
								labelText: this.translate('label', 'fields', 'Admin'),
							},
							{
								name: 'iconClass',
								labelText: this.translate('iconClass', 'fields', 'EntityManager'),
							},
							{
								name: 'color',
								labelText: this.translate('color', 'fields', 'EntityManager'),
							},
						],
						[
							{
								name: 'link',
								labelText: this.translate('link', 'fields', 'Settings'),
							},
							false,
						],
					],
				},
			];

			const model = (this.model = new Model());

			model.name = 'CustomLinkTab';

			model.set(this.options.itemData);

			model.setDefs({
				fields: {
					text: {
						type: 'varchar',
					},
					iconClass: {
						type: 'base',
						view: 'views/admin/entity-manager/fields/icon-class',
					},
					color: {
						type: 'base',
						view: 'views/fields/colorpicker',
					},
					link: {
						type: 'url',
						view: 'views/fields/varchar',
					},
				},
			});

			this.createView('record', 'views/record/edit-for-modal', {
				detailLayout: detailLayout,
				model: model,
				el: this.getSelector() + ' .record',
			});
		},
	});
});
