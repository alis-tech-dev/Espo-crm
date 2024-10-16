define(['views/fields/wysiwyg'], Dep => {
	return class extends Dep {
		setup() {
			super.setup();

			// This is needed so that files can be saved
			this.model.entityType = 'Template';
		}

		attachFile() {
			super.attachFile();
		}
	};
});
