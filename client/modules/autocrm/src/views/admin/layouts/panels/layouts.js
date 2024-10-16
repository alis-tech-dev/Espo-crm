define('autocrm:views/admin/layouts/panels/layouts', ['view'], function (Dep) {
	return Dep.extend({
		template: 'autocrm:admin/layouts/panels/layouts',

		scopeTypeLists: {},

		setup: function () {
			this.scopeList = this.scopeList || this.options.scopeList;
			this.scope = this.scope || this.options.scope || this.scopeList[0];

			this.options.scopeDataList.forEach(function (item) {
				this.scopeTypeLists[item.scope] = item.typeList;
			}, this);

			this.listenTo(
				this.model,
				'change:scope',
				function () {
					const scope = this.model.get('scope');

					if (scope) {
						this.scope = scope;
						this.reRender();
					}
				},
				this,
			);
		},

		addLayout: function (scope, type) {
			this.scopeTypeLists[scope].push(type);
			this.reRender();
		},

		data: function () {
			return {
				scope: this.scope,
				typeList: this.scopeTypeLists[this.scope],
			};
		},
	});
});
