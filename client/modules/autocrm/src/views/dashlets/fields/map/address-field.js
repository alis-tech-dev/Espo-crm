define('autocrm:views/dashlets/fields/map/address-field', ['views/fields/enum'], function (Dep) {
	return Dep.extend({
		setup: function () {
			Dep.prototype.setup.call(this);
			this.listenTo(this.model, 'change:entityType', () => {
				this.setup();
				this.reRender();
			});
		},

		setupOptions: function () {
			const entityType = (this.entityType = this.model.get('entityType'));
			const defs = this.getMetadata().get(['entityDefs', entityType, 'fields'], {});

			this.params.options = Object.keys(defs).filter(
				field => defs[field].type === 'address' && defs[field].saveCoordinates,
			);
		},

		setupTranslation: function () {
			this.translatedOptions = {};
			this.params.options.forEach(
				field => (this.translatedOptions[field] = this.translate(field, 'fields', this.entityType)),
			);
		},
	});
});
