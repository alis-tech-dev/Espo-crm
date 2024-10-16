define(['dynamic-handler'], Dep => {
	return Dep.extend({
		init: function () {
			if (this.model.has('type')) {
				this.controlType();
				return;
			}

			this.recordView.listenToOnce(this.model, 'sync', this.controlType.bind(this));
		},

		controlType: function () {
			if (this.model.get('type') !== 'EasyEmail') {
				if (this.recordView.isRendered()) {
					this.hideEditor();
				}

				this.recordView.once('after:render', this.hideEditor.bind(this));

				return;
			}

			this.recordView.hideField('body');
			this.recordView.setFieldReadOnly('isHtml');
		},

		hideEditor: function () {
			const fieldView = this.recordView.getFieldView('bodyEasyEmail');
			const $cell = fieldView.get$cell().closest('.cell');
			const $label = $cell.find('label');

			$label.addClass('hidden');
			$cell.addClass('hidden-cell');

			fieldView.remove();
		},
	});
});
