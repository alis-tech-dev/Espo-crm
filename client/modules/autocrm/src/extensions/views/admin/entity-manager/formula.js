extend('autocrm:extensions/views/admin/entity-manager/formula', function (Dep) {
	return Dep.extend({
		setup: function () {
			const orgGetRequest = Espo.Ajax.getRequest;
			Espo.Ajax.getRequest = (url, data, options) => {
				return orgGetRequest.call(Espo.Ajax, url, data, options).then(result => {
					if (url === 'Metadata/action/get' && data.key && data.key.startsWith('formula')) {
						Espo.Ajax.getRequest = orgGetRequest;
						this.model.set('readLoaderCustomScript', result?.readLoaderCustomScript);
						this.model.set('listLoaderCustomScript', result?.listLoaderCustomScript);
					}

					return result;
				});
			};
			Dep.prototype.setup.call(this);
		},
	});
});
