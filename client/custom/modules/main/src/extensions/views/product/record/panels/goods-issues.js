define(['main:extensions/views/product/record/panels/goods-issues'], Dep => {
	return class extends Dep {
		setup() {
			this.defs.create = true;
			this.defs.createDisabled = false;

			super.setup();
		}
	};
});
