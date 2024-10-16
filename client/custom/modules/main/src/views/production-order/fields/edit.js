define(['views/modals/edit'], Dep => {
    return class extends Dep {
        template = 'main:production-order/fields/take-from-warehouse/modal-edit';

        setup() {
            this.buttonList = [];

            if ('saveDisabled' in this.options) {
                this.saveDisabled = this.options.saveDisabled;
            }

            if (!this.saveDisabled) {
                this.buttonList.push({
                    name: 'save',
                    label: 'Save',
                    style: 'primary',
                    title: 'Ctrl+Enter',
                });
            }
            this.layoutName = this.options.layoutName || this.layoutName;

            this.buttonList.push({
                name: 'cancel',
                label: 'Cancel',
                title: 'Esc',
            });

            this.scope = this.scope || this.options.scope || this.options.entityType;
            this.entityType = this.options.entityType || this.scope;
            this.id = this.options.id;

            this.headerHtml = this.composeHeaderHtml();

            this.sourceModel = this.model;

            this.waitForView('edit');

            this.getModelFactory().create(this.entityType, (model) => {
                if (this.id) {
                    if (this.sourceModel) {
                        model = this.model = this.sourceModel.clone();
                    }
                    else {
                        this.model = model;

                        model.id = this.id;
                    }

                    model
                        .fetch()
                        .then(() => {
                            this.createRecordView(model);
                        });

                    return;
                }

                this.model = model;

                if (this.options.relate) {
                    model.setRelate(this.options.relate);
                }

                if (this.options.attributes) {
                    model.set(this.options.attributes);
                }

                this.createRecordView(model);
            });
        }
        composeHeaderHtml() {
            let html;

            if (!this.id) {
                html = $('<span>')
                    .text(this.getLanguage().translate('Take from warehouse', 'labels', this.scope))
                    .get(0).outerHTML;
            }
            else {
                const text = this.getLanguage().translate('Edit') + ' · ' +
                    this.getLanguage().translate(this.scope, 'scopeNames');

                html = $('<span>')
                    .text(text)
                    .get(0).outerHTML;
            }

            if (!this.fullFormDisabled) {
                const url = this.id ?
                    '#' + this.scope + '/edit/' + this.id :
                    '#' + this.scope + '/create';

            }

            html = this.getHelper().getScopeColorIconHtml(this.scope) + html;

            return html;
        }

        afterRender() {
        this.$el.find('label[data-name="name"] .label-text').text('Quantity');
        this.$el.find('select[data-name="stockLocation"]').val();
    }

    }
});