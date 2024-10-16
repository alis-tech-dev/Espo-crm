extend(Dep => {
	return class extends Dep {
		emailCheckInterval = 60;

		setup() {
			super.setup();

			this.useWebSocket = this.getConfig().get('useWebSocket');
			this.emailCheckInterval = this.getConfig().get('emailCheckInterval') || this.emailCheckInterval;
			this.lastController = null;

			this.getRouter().on('routed', e => {
				if ((e.controller === 'Email' && e.action === 'view') || this.lastController === 'Email') {
					this.runCheckNewEmails();
				}

				this.lastController = e.controller;
			});
		}

		isViewingAs() {
			return document.cookie.indexOf('view-as-user-id') > -1;
		}

		getMenuDataList() {
			const menuDataList = super.getMenuDataList();

			if (this.isViewingAs()) {
				const logoutItem = menuDataList.find(item => item.action === 'logout');
				logoutItem.label = this.translate('Return to My Account');
			}

			return menuDataList;
		}

		actionLogout() {
			if (!this.isViewingAs()) {
				super.actionLogout();
				return;
			}

			document.cookie = 'view-as-user-id=; SameSite=Lax; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';

			Espo.Ajax.postRequest('Admin/clearCache').then(() => {
				setTimeout(() => window.location.reload(), 1);
			});
		}

		afterRender() {
			super.afterRender();

			this.addShepherdButton();
			this.setupEmailCountBadge();
			this.runCheckNewEmails();
			this.prepareTabCustomLinks();

			if (this.getUser().isAdmin() && this.getConfig().get('editNavbarEnabled')) {
				this.addEditButton();
			}
		}

		setupEmailCountBadge() {
			const emailCountBadge = $('#email-count-badge');

			if (emailCountBadge.length) {
				this.$emailCountBadge = emailCountBadge;
				return;
			}

			this.$emailCountBadge = $('<span class="badge number-badge"></span>');
			this.$emailCountBadge.hide();

			const $wrapper = $('<div id="email-count-badge"></div>');
			$wrapper.append(this.$emailCountBadge);
			$("a[href='#Email']").append($wrapper);
		}

		runCheckNewEmails() {
			this.checkNewEmails();

			if (this.useWebSocket && this.getHelper().webSocketManager) {
				this.getHelper().webSocketManager.subscribe('newNotification', () => {
					this.checkNewEmails();
				});

				return;
			}

			if (this.timeout) {
				clearTimeout(this.timeout);
			}

			this.timeout = setTimeout(() => this.runCheckNewEmails(), this.emailCheckInterval * 1000);
		}

		checkNewEmails() {
			Espo.Ajax.getRequest('Email/inbox/notReadCounts').then(data => {
				const count = data.inbox || 0;

				this.$emailCountBadge.text(count > 99 ? '99+' : count);
				this.$emailCountBadge.toggle(count > 0);
			});
		}

		createItemView(name) {
			const defs = this.getItemDefs(name);

			if (!defs || !defs.view) {
				return Promise.resolve();
			}

			if (defs.adminOnly && !this.getUser().isAdmin()) {
				return Promise.resolve();
			}

			const key = name + 'Item';

			return this.createView(key, defs.view, {
				selector: `[data-item="${name}"]`,
			});
		}

		getItemDataList() {
			const defsMap = {};

			this.itemList.forEach(name => {
				defsMap[name] = this.getItemDefs(name);
			});

			return this.itemList
				.filter(name => {
					const defs = defsMap[name];

					if (!defs) {
						return false;
					}

					if (defs.adminOnly && !this.getUser().isAdmin()) {
						return false;
					}

					const view = this.getView(name + 'Item');

					if ('isAvailable' in view) {
						return view.isAvailable();
					}

					return true;
				})
				.map(name => {
					return {
						key: name + 'Item',
						name: name,
						class: defsMap[name].class || '',
					};
				});
		}

		prepareTabCustomLinks() {
			this.$el.find('ul.nav li a.nav-custom-link:not([href^="#"])').attr('target', '_blank');
		}

		filterTabItem(tab) {
			const original = super.filterTabItem(tab);

			if (original) {
				return original;
			}

			return typeof tab === 'object' && tab.type === 'customLink' && tab.link;
		}

		setupTabDefsList() {
			const tabList = this.getTabList().filter(item => {
				if (!item) {
					return false;
				}

				if (typeof item === 'object') {
					switch (item.type) {
						case 'customLink':
							return !!item.link;
						case 'divider':
							return true;
						default:
							item.itemList = item.itemList || [];
							item.itemList = item.itemList.filter(this.filterTabItem.bind(this));

							return !!item.itemList.length;
					}
				}

				return this.filterTabItem(item);
			});

			Object.defineProperty(this, 'tabList', {
				set(_) {},
				get: () => tabList,
				configurable: true,
			});

			super.setupTabDefsList();
		}

		prepareTabItemDefs(params, tab, i, vars) {
			if (typeof tab !== 'object' || tab.type !== 'customLink') {
				return super.prepareTabItemDefs(params, tab, i, vars);
			}

			let label = tab.text || '';

			if (label.indexOf('label@') === 0) {
				label = this.translate(label.substring(6), 'tabs');
			}

			const defs = {
				link: tab.link,
				label: label,
				shortLabel: label.substring(0, 2),
				name: 'custom-link-' + i,
				isInMore: vars.moreIsMet,
				color: tab.color,
				iconClass: tab.iconClass,
				isAfterShowMore: vars.isHidden,
				aClassName: 'nav-custom-link',
				isGroup: false,
			};

			if (defs.isHidden) {
				defs.className = 'after-show-more';
			}

			if (defs.color && !defs.iconClass) {
				defs.colorIconClass = 'color-icon fas fa-square-full';
			}

			return defs;
		}

		addShepherdButton() {
			const shepherdButtonId = 'shepherd-button';

			if (document.getElementById(shepherdButtonId)) {
				return;
			}

			const questionMark = $(
				`<li><a id="${shepherdButtonId}" class="btn btn-link"><span class="fas fa-question"></span></a></li>`,
			);
			const globalSearch = this.$el.find('.nav.navbar-nav.navbar-right li.global-search-container');

			if (!globalSearch.length) {
				console.error('Global search element not found');
				return;
			}

			globalSearch.after(questionMark);

			questionMark.on('click', async () => {
				await this.startShepherdTour(this.currentTab, true, true);
			});
		}

		selectTab(name) {
			super.selectTab(name);

			void this.startShepherdTour(name);
		}

		async startShepherdTour(scope, showNotImplemented = false, force = false) {
			switch (scope) {
				case 'Home':
					await this.startShepherdIntro(force);
					return;
			}

			let shepherdPath = this.getMetadata().get(['clientDefs', scope, 'shepherd']);

			if (!shepherdPath && !showNotImplemented) {
				return;
			}

			shepherdPath = 'autocrm:shepherd/not-implemented';

			const Shepherd = await Espo.loader.requirePromise(shepherdPath);

			new Shepherd(this.getHelper()).start(force);
		}

		async startShepherdIntro(force = false) {
			const shepherdPath =
				this.getMetadata().get(['clientDefs', 'app', 'shepherd', 'intro']) || 'autocrm:shepherd/intro';

			const Shepherd = await Espo.loader.requirePromise(shepherdPath);

			new Shepherd(this.getHelper()).start(force);
		}

		addEditButton() {
			const editButtonId = 'edit-navbar-button';

			if (document.getElementById(editButtonId)) {
				return;
			}

			const editNavbarLabel = this.translate('Edit Navbar');

			const editButton = $('<li>')
				.addClass('not-in-more tab')
				.append(
					$('<a>')
						.attr('href', 'javascript:')
						.addClass('nav-link')
						.attr('data-action', 'editNavbar')
						.append(
							$('<span>')
								.addClass('short-label')
								.attr('title', editNavbarLabel)
								.append($('<span>').addClass('far fa-wrench')),
						)
						.append($('<span>').addClass('full-label').text(editNavbarLabel)),
				);

			const tabsContainer = this.$el.find('.nav.navbar-nav.tabs');

			if (!tabsContainer.length) {
				console.error('Tabs container not found');
				return;
			}

			tabsContainer.append(editButton);

			editButton.on('click', () => {
				this.actionEditNavbar();
			});
		}

		actionEditNavbar() {
			this.createView('modal', 'autocrm:views/modals/edit-navbar', {}, view => {
				view.render();
			});
		}
	};
});
