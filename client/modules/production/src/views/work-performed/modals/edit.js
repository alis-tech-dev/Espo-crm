define(['views/modals/edit'], Dep => {
	return class extends Dep {
		handleRecordViewOptions(options) {
			options.dataObject = { parentModel: this.options.parentModel };
		}
	};
});
