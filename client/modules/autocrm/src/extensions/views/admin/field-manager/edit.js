extend(Dep => {
	return Dep.extend({
		setupFieldData: function (callback) {
			const fieldManager = this.getFieldManager();
			const orgGetParamList = fieldManager.getParamList;
			const context = this;

			this.hasNotStorable = this.getMetadata().get(['fields', this.type, 'notStorable']) !== false;

			if (this.hasNotStorable) {
				fieldManager.getParamList = function (fieldType) {
					const paramList = orgGetParamList.call(this, fieldType);
					const alreadyHasNotStorable = paramList.some(item => item.name === 'notStorable');

					if (!alreadyHasNotStorable) {
						if (typeof context.defs.notStorable === 'undefined') {
							context.defs.notStorable = false;
						}

						paramList.unshift({
							name: 'notStorable',
							type: 'bool',
							tooltip: true,
							default: false,
							readOnly: !context.isNew,
						});
					}

					fieldManager.getParamList = orgGetParamList; // monkey patch only for the first use
					return paramList;
				};
			}

			Dep.prototype.setupFieldData.call(this, callback);
		},
	});
});
