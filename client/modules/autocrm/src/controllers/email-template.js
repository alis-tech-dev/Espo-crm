define(['controllers/record'], Dep => {
	return Dep.extend({
		create: function (options) {
			options = options || {};
			options.attributes = options.attributes || {};

			if ('type' in options) {
				options.attributes.type = options.type;

				if (options.type === 'EasyEmail') {
					options.isHtml = true;
				}
			}

			Dep.prototype.create.call(this, options);
		},
	});
});
