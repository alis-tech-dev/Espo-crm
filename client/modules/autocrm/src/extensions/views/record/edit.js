extend(Dep => {
    return class extends Dep {
        afterNotValid() {
            const firstErrorElement = this.$el.find(`.has-error`).first();
            const labelText = firstErrorElement.find('.label-text').text();
            super.afterNotValid();

            if (firstErrorElement.length) {
                setTimeout(() => {
                    const elementTop = firstErrorElement.offset().top;
                    const elementHeight = firstErrorElement.outerHeight();
                    const windowHeight = $(window).height();

                    const targetScroll = elementTop - (windowHeight / 2) + (elementHeight / 2);

                    $('html, body').animate(
                        {
                            scrollTop: targetScroll,
                        },
                        500
                    );
                }, 100);
            }
            Espo.Ui.error(`Field "${labelText}" is required!`)
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
