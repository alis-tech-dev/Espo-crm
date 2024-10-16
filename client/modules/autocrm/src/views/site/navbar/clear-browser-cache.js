define(['view'], Dep => {
	return class extends Dep {
		template = 'autocrm:site/navbar/clear-browser-cache';

		setup() {
			this.addActionHandler('clearBrowserCache', () => {
				Espo.Ui.notify(this.translate(' ... '));

				Espo.Ajax.postRequest('ClearBrowserCache').then(() => {
					Espo.Ui.success(this.translate('Browser cache cleared'));
					window.location.reload();
				});
			});
		}
	};
});
