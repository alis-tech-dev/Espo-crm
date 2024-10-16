define(['view'], Dep => {
	return class extends Dep {
		template = 'autocrm:site/navbar/clear-cache';

		setup() {
			this.addActionHandler('clearCache', () => {
				Espo.Ui.notify(this.translate(' ... '));

				Espo.Ajax.postRequest('Admin/clearCache').then(() => {
					Espo.Ui.success(this.translate('Cache has been cleared'));
				});
			});
		}
	};
});
