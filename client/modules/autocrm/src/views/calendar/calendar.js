define(['crm:views/calendar/calendar', 'ui/select'], (Dep, Select) => {
	return class extends Dep {
		template = 'autocrm:calendar/calendar';

		data() {
			const data = super.data();

			const userList = this.getHelper().getAppParam('userList') || [];

			const userNameMap = {};

			userList.forEach(user => {
				userNameMap[user.id] = user.name;
			});

			const userIds = userList.map(user => user.id);

			return {
				...data,
				userList,
				userIds,
				userNameMap,
				selectedUser: this.options.userId || this.getUser().get('id'),
			};
		}

		afterRender() {
			super.afterRender();

			const $select = this.$el.find('.calendar-user-switch > select');

			Select.init($select, {
				matchAnyWord: true,
			});

			$select.on('change', () => {
				const selectedId = $select.val();

				const userList = this.getHelper().getAppParam('userList') || [];

				const userName = (userList.find(user => user.id === selectedId) || {}).name || '';

				this.getRouter().navigate('#Calendar/show/userId=' + selectedId + '&userName=' + userName, {
					trigger: true,
				});
			});
		}
	};
});
