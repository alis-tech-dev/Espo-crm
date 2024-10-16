define(['action-handler'], ActionHandler => {
	return class extends ActionHandler {
		async actionExportToIsdoc() {
			const { id, entityType } = this.view.model;

			const params = $.param({
				id,
				entityType,
			});

			Espo.Ui.notify(' ... ');

			const { attachmentId } =
				(await Espo.Ajax.getRequest('ExportToIsdoc' + '?' + params)) ||
				{};

			Espo.Ui.notify(false);

			const attachmentUrl =
				this.view.getBasePath() +
				'?' +
				$.param({
					entryPoint: 'download',
					id: attachmentId,
				});

			window.open(attachmentUrl, '_blank');
		}
	};
});
