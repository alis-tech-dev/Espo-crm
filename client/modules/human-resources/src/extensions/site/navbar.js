extend(Dep => {
	return Dep.extend({
		setup: function () {
			Dep.prototype.setup.call(this);

			this.events['click .action[data-action="attendanceReport"]'] =
				e => {
					const target = $(e.currentTarget);
					if (target.hasClass('report-arrival')) {
						const options =
							this.getFieldManager().getEntityTypeFieldParam(
								'Attendance',
								'status',
								'options',
							) || [];
						const optionsStyle =
							this.getFieldManager().getEntityTypeFieldParam(
								'Attendance',
								'status',
								'style',
							) || {};
						const dialog = Espo.Ui.dialog({
							body:
								'<span class="confirm-message">' +
								this.translate(
									'Choose attendance type',
									'messages',
									'Attendance',
								) +
								'</a>',
							buttons: options
								.map(option => ({
									name: option,
									text: option,
									style: optionsStyle[option] || 'default',
									onClick: () => {
										dialog.close();
										this.handleAttendanceReport(option);
									},
									position: 'left',
								}))
								.concat([
									{
										name: 'cancel',
										text: this.translate('Cancel'),
										onClick: () => dialog.close(),
										position: 'right',
									},
								]),
						});

						dialog.show();
					} else {
						this.confirm(
							this.translate('confirmation', 'messages'),
							function () {
								this.handleAttendanceReport('out');
							},
							this,
						);
					}
				};
		},

		afterRender: function () {
			Dep.prototype.afterRender.call(this);

			const buttonHtml =
				'<button type="button" id="attendanceReport_btn" class="btn btn-default action" data-action="attendanceReport" style="display:none">' +
				this.translate('Mark arrival', 'labels', 'Attendance') +
				'</button>';
			this.$el
				.find('.navbar-right-container > ul')
				.prepend('<li class="nav navbar-nav">' + buttonHtml + '</li>');
			this.$attendanceButton = this.$el.find('#attendanceReport_btn');

			this.updateAttendanceBtn();
		},

		handleAttendanceReport: function (status) {
			const userId = this.getUser().id;

			Espo.Ajax.postRequest('Attendance/action/createOrUpdate', {
				userId: userId,
				status: status,
			})
				.then(response => {
					if (response.success) {
						this.updateAttendanceBtn(response.status);
						this.updateCalendar();
					}
				})
				.catch(error => {
					console.error('Failed to update attendance:', error);
					Espo.Ui.error(this.translate('Error'));
				});
		},

		updateAttendanceBtn: function (status) {
			if (status) {
				this.setAttendanceButtonStatus(status);
			} else {
				this.fetchAttendanceStatus();
			}
		},

		setAttendanceButtonStatus: function (status) {
			if (status === 'in') {
				this.$attendanceButton.text(
					this.translate('Mark departure', 'labels', 'Attendance'),
				);
				this.$attendanceButton
					.removeClass('report-arrival')
					.addClass('report-departure');
			} else {
				this.$attendanceButton.text(
					this.translate('Mark arrival', 'labels', 'Attendance'),
				);
				this.$attendanceButton
					.removeClass('report-departure')
					.addClass('report-arrival');
			}
			this.$attendanceButton.show();
		},

		fetchAttendanceStatus: function () {
			const userId = this.getUser().id;

			Espo.Ajax.postRequest('Attendance/action/createOrUpdate', {
				userId: userId,
			})
				.then(response => {
					if (response.success) {
						this.setAttendanceButtonStatus(response.status);
					} else {
						this.setDefaultAttendanceButton();
					}
				})
				.catch(error => {
					console.error('Failed to get attendance status:', error);
					this.setDefaultAttendanceButton();
				});
		},

		setDefaultAttendanceButton: function () {
			this.$attendanceButton.text(
				this.translate('Mark arrival', 'labels', 'Attendance'),
			);
			this.$attendanceButton
				.removeClass('report-departure')
				.addClass('report-arrival');
			this.$attendanceButton.show();
		},

		updateCalendar: function () {
			const view = this.getParentView().getParentView().getView('main');
			const calendar =
				view.getView('calendar') || view.getView('timeline') || false;

			if (calendar !== false) {
				calendar.reRender();
			}
		},
	});
});
