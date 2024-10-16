define(['view'], Dep => {
	return class extends Dep {
		template = 'autocrm:site/navbar/rebuild';

		setup() {
			this.addActionHandler('rebuild', () => {
				Espo.Ui.notify(this.translate(' ... '));

				Espo.Ajax.postRequest('Admin/rebuild').then(() => {
					Espo.Ui.success(this.translate('Rebuild has been done'));
				});
			});
		}
	};
});
