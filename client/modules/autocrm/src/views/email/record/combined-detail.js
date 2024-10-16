define(['views/record/detail-small', 'views/email/detail'], function (Dep, Detail) {
	return Dep.extend({
		setup: function () {
			this.events['click .field[data-name="replies"] a, .field[data-name="replied"] a'] = e => {
				e.preventDefault();

				const target = $(e.currentTarget);

				const id = target.attr('data-id') || target.attr('href').split('/').pop();

				this.trigger('clicked-reply', id);
			};

			Dep.prototype.setup.call(this);

			this.listenToOnce(this.model, 'sync', () => {
				setTimeout(() => {
					this.model.set('isRead', true);
				}, 50);
			});

			this.setupButtons();
		},

		setupButtons: function () {
			this.addButton(
				{
					name: 'forward',
					label: 'Forward',
					action: 'forward',
				},
				false,
			);

			this.addButton(
				{
					name: 'createTask',
					label: 'Create Task',
					action: 'createTask',
					acl: 'create',
					aclScope: 'Task',
					style: 'success',
				},
				false,
			);

			this.addButton(
				{
					name: this.getPreferences().get('emailReplyToAllByDefault') ? 'replyToAll' : 'reply',
					label: 'Reply',
					style: 'danger',
				},
				false,
			);

			this.addButton(
				{
					name: 'fullForm',
					label: 'Full Form',
				},
				false,
			);

			this.addDropdownItem(false, true);

			this.addDropdownItem(
				{
					label: 'Reply to All',
					name: 'replyToAll',
				},
				true,
			);

			this.addDropdownItem(
				{
					label: 'Reply',
					name: 'reply',
				},
				true,
			);

			this.addDropdownItem(false);

			if (this.model.get('status') === 'Archived') {
				if (!this.model.get('parentId')) {
					this.addDropdownItem({
						label: 'Create Lead',
						name: 'createLead',
						acl: 'create',
						aclScope: 'Lead',
					});

					this.addDropdownItem({
						label: 'Create Contact',
						name: 'createContact',
						acl: 'create',
						aclScope: 'Contact',
					});
				}
			}

			this.addDropdownItem({
				label: 'Create Task',
				name: 'createTask',
				acl: 'create',
				aclScope: 'Task',
			});

			if (this.model.get('parentType') !== 'Case' || !this.model.get('parentId')) {
				this.addDropdownItem({
					label: 'Create Case',
					name: 'createCase',
					acl: 'create',
					aclScope: 'Case',
				});
			}
		},

		exitAfterDelete: () => true, // prevent folder change on delete

		actionFullForm: function () {
			this.getRouter().dispatch('Email', 'view', {
				attributes: _.extend(this.fetch(), this.model.getClonedAttributes()),
				returnUrl: Backbone.history.fragment,
				model: this.model,
				id: this.model.id,
			});
			this.getRouter().navigate('#Email/view/' + this.model.id, {
				trigger: false,
			});
		},

		actionCreateLead: function () {
			Detail.prototype.actionCreateLead.call(this);
		},

		actionCreateContact: function () {
			Detail.prototype.actionCreateContact.call(this);
		},

		actionCreateTask: function () {
			Detail.prototype.actionCreateTask.call(this);
		},

		actionCreateCase: function () {
			Detail.prototype.actionCreateCase.call(this);
		},

		actionForward: function () {
			Detail.prototype.actionForward.call(this);
		},

		actionReply: function (data, e, cc) {
			Detail.prototype.actionReply.call(this, data, e, cc);
		},

		actionReplyToAll: function (data, e) {
			Detail.prototype.actionReplyToAll.call(this, data, e);
		},

		actionPrevious: function () {
			this.trigger('switch-neighbor', {
				direction: -1,
			});
		},

		actionNext: function () {
			this.trigger('switch-neighbor', {
				direction: 1,
			});
		},

		// Hacks for email detail view methods
		getRecordView: function () {
			return this;
		},

		removeMenuItem: function (name) {
			this.removeActionItem(name);
		},
	});
});
