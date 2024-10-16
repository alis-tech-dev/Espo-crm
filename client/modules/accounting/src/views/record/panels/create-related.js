define('accounting:views/record/panels/create-related', [
	'views/record/panels/relationship',
], function (Dep) {
	return Dep.extend({
		setup: function () {
			this.defs.create = true;
			this.defs.createAction = 'createRelatedWithConversion';

			Dep.prototype.setup.call(this);
		},

		actionCreateRelatedWithConversion: function () {
			this.notify('Loading...');

			this.ajaxGetRequest(
				this.model.name + '/action/getConvertAttributesFor',
				{
					scope: this.scope,
					id: this.model.id,
				},
			).then(attributes => {
				const viewName =
					this.getMetadata().get([
						'clientDefs',
						this.scope,
						'modalViews',
						'edit',
					]) || 'views/modals/edit';
				const foreignLink = this.model.getLinkParam(
					this.link,
					'foreign',
				);

				this.createView(
					'quickCreate',
					viewName,
					{
						scope: this.scope,
						relate: {
							model: this.model,
							link: foreignLink,
						},
						attributes: attributes,
					},
					view => {
						view.render();
						view.notify(false);

						this.listenToOnce(view, 'after:save', () => {
							this.collection.fetch();
						});
					},
				);
			});
		},
	});
});
