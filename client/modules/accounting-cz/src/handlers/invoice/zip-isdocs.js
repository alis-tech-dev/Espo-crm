define(() => {
	const Handler = class {
		constructor(view) {
			this.view = view;
		}
	};

	return class extends Handler {
		async actionZipIsdocs(data) {
			Espo.Ui.notify(' ... ');

			const { attachmentId } =
				(await Espo.Ajax.postRequest('ZipIsdocs', data)) || {};

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
