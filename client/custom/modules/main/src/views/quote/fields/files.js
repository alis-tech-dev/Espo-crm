define(['views/fields/attachment-multiple'], Dep => {
	return class extends Dep {
		fetch() {
			const data = super.fetch();

			data[this.nameHashName] = this.model.get(this.nameHashName) || {};

			return data;
		}
	};
});
