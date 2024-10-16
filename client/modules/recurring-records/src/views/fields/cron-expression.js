define(['views/fields/varchar', 'views/scheduled-job/fields/scheduling', 'lib!JQueryCron', 'lib!cronstrue'],
    (Dep, SchedulingField, __, cronstrue) => {
        return Dep.extend({
            forceTrim: true,

            viewMode: 'user-friendly',

            editTemplate: 'recurring-records:fields/cron-expression/edit',

            validations: ['required', 'cron'],

            events: _.extend({
                'click .action[data-action="setViewMode"]': function (e) {
                    e.preventDefault();
                    this.actionSetViewMode();
                }
            }, Dep.prototype.events),

            setup: function () {
                SchedulingField.prototype.setup.call(this);
            },

            data: function () {
                const data = Dep.prototype.data.call(this);
                data.viewMode = this.viewMode;
                data.isAdvanced = this.viewMode === 'advanced';
                return data;
            },

            afterRender: function () {
                if (this.mode === 'edit') {
                    if (this.viewMode === 'user-friendly') {
                        this.$userFriendly = this.$el.find('.cron-expr__user-friendly');
                        this.$userFriendly.cron({
                            initial: this.model.get(this.name),
                            onChange: () => {
                                this.cronExpressionChange();
                            },
                            labels: this.getTranslatedCronLabels(),
                        });
                        this.cronExpressionChange();
                    } else {
                        SchedulingField.prototype.afterRender.call(this);
                    }
                }
            },

            getTranslatedCronLabels: function () {
                const labels = Object.keys(window.cronLabelsLocalisation);
                const translatedLabels = {};

                labels.forEach(label => {
                    translatedLabels[label] = this.translate(label, 'cronLabels', 'RecordRecurrence');
                });

                return translatedLabels;
            },

            cronExpressionChange: function () {
                try {
                    const value = this.$userFriendly.cron('value');

                    this.model.set(this.name, value);
                } catch (e) {
                    // do nothing
                }
            },

            getValueForDisplay: function () {
                if (this.mode === 'list' || this.mode === 'detail') {
                    const exp = this.model.get(this.name);

                    return this.getReadableForm(exp);
                }

                return Dep.prototype.getValueForDisplay.call(this);
            },

            setViewMode: function (mode) {
                this.viewMode = mode;
            },

            actionSetViewMode: function () {
                this.setViewMode(this.viewMode === 'advanced' ? 'user-friendly' : 'advanced');
                this.reRender();
            },

            showText: function () {
                const exp = this.model.get(this.name);

                if (exp === '* * * * *') {
                    this.$text.text(this.getReadableForm(exp));

                    return;
                }

                SchedulingField.prototype.showText.call(this);
            },

            getReadableForm: function (exp) {
                let locale = 'en';
                const localeList = Object.keys(cronstrue.default.locales);
                const language = this.getLanguage().name;

                if (~localeList.indexOf(language)) {
                    locale = language;
                } else if (~localeList.indexOf(language.split('_')[0])) {
                    locale = language.split('_')[0];
                }

                try {
                    return cronstrue.toString(exp, {
                        use24HourTimeFormat: !this.getDateTime().hasMeridian(),
                        locale: locale,
                    });
                } catch (e) {
                    return this.translate('Not valid');
                }
            },

            validateCron: function () {
                const exp = this.model.get(this.name);

                try {
                    cronstrue.toString(exp);
                } catch (e) {
                    this.showValidationMessage(this.translate('cronExprInvalid', 'messages', 'RecordRecurrence'));

                    return true;
                }
            },

            fetch: function () {
                if (this.viewMode === 'advanced') {
                    return Dep.prototype.fetch.call(this);
                }
                const data = {};
                data[this.name] = this.$userFriendly.cron('value');
                return data;
            }
        });
    });
