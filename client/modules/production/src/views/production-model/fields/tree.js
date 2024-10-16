define(['views/base'], Dep => {
	return class extends Dep {
		template = 'production:production-model/fields/production-tree';

		data() {
			return {};
		}
	};
});
