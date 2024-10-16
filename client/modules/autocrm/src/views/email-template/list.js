define('autocrm:views/email-template/list', ['views/email-template/list'], function (Dep) {
	return Dep.extend({
		actionCreate: function () {
			this.createView('createModal', 'autocrm:views/email-template/modals/create', {}, function (view) {
				view.render();

				this.listenToOnce(view, 'create', data => {
					view.close();

					const url = '#EmailTemplate/create/type=' + data.type;
					const attributes = this.getCreateAttributes() || {};
					const options = { attributes: attributes };

					if (this.keepCurrentRootUrl) {
						options.rootUrl = this.getRouter().getCurrentUrl();
					}

					if (data.focusForCreate) {
						options.focusForCreate = true;
					}

					const returnDispatchParams = {
						controller: this.scope,
						action: null,
						options: { isReturn: true },
					};

					this.prepareCreateReturnDispatchParams(returnDispatchParams);

					_.extend(options, {
						type: data.type,
						returnUrl: this.getRouter().getCurrentUrl(),
						returnDispatchParams: returnDispatchParams,
					});

					this.getRouter().navigate(url, { trigger: false });
					this.getRouter().dispatch('EmailTemplate', 'create', options);
				});
			});
		},
	});
});
