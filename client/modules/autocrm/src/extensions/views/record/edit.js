extend(Dep => {
	return class extends Dep {
		afterNotValid() {
			super.afterNotValid();

			// Find all invalid tab buttons
			const firstInvalidTab = this.$el.find('.middle-tabs button.btn.invalid').first();

			// Click the first invalid tab button
			if (firstInvalidTab) {
				const tab = parseInt(firstInvalidTab.data('tab'));

				const firstErrorElement = this.$el.find(`.panel[data-tab="${tab}"] .has-error`).first();

				// In theory, the tab doesn't have any error fields
				if (firstErrorElement) {
					this.selectTab(tab, () => {
						const elementTop = firstErrorElement.offset().top;
						const elementHeight = firstErrorElement.outerHeight();
						const windowHeight = $(window).height();
						const scrollTop = $(window).scrollTop();

						if (elementTop < scrollTop || elementTop + elementHeight > scrollTop + windowHeight) {
							// Scroll to bring the element to the middle of the view
							$('html, body').animate(
								{
									scrollTop: elementTop - windowHeight / 2 + elementHeight / 2,
								},
								500,
							);
						}
					});
				}
			}
		}

		selectTab(tab, callback = null) {
			this.currentTab = tab;

			$('.popover.in').removeClass('in');

			this.whenRendered().then(() => {
				this.$el.find('.middle-tabs > button').removeClass('active');
				this.$el.find(`.middle-tabs > button[data-tab="${tab}"]`).addClass('active');

				this.$el.find('.middle > .panel[data-tab]').addClass('tab-hidden');
				this.$el.find(`.middle > .panel[data-tab="${tab}"]`).removeClass('tab-hidden');

				this.adjustMiddlePanels();
				this.recordHelper.trigger('panel-show');

				if (callback) {
					callback();
				}
			});

			this.storeTab();
		}
	};
});
