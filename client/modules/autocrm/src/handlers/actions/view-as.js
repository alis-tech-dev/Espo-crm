define(['action-handler'], Dep => {
	return Dep.extend({
		init: function () {
			if (!this.view.getUser().isAdmin() || this.view.model.id === this.view.getUser().id) {
				this.view.hideHeaderActionItem('viewAs');

				return;
			}

			this.view.showHeaderActionItem('viewAs');
		},

		actionViewAs: function () {
			document.cookie = 'view-as-user-id=' + this.view.model.id + '; SameSite=Lax; path=/';
			window.location.href = '/';
		},
	});
});
