define(['views/fields/base'], Dep => {
    return class extends Dep {
        listTemplate = 'main:production-order/fields/perform-work/finish';

        events = {
            'click [data-action="performWorkFinish"]': function () {
                this.performWorkFinish();
            },
        };

        fetch() {
			return {};
		}

        performWorkFinish () {
            const initialButtonStates = this.toggleButtons(true);
            const id = this.model.get('id');

            this.ajaxPostRequest(`ProductionOrder/updatePerformWork/${id}`)
                .then(_response => {
                    const status = _response.status;
                    if (status === 'Success') {
                        this.model.set('isPerform', false);
                        this.model.save().then(() => {
                            this.restoreButtonStates(initialButtonStates);
                            this.enablePerformWorkButton();
                            Espo.Ui.success(`Perform work finished.`);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error during performWorkFinish:', error);
                    Espo.Ui.error('An error occurred while finishing the work.');
                })

        }



        enablePerformWorkButton () {
            const view = this.getParentView().getParentView().getParentView();
            const orders = view.model.get('productionOrdersRecordList');

            orders.forEach((order) => {
                const id = order.id;
                const isPerform = order.isPerform;
                const tr = document.querySelector(`tr[data-id="${id}"]`);
                const button = tr.querySelector(`td[data-name="performWorkButton"] button[data-action="performWork"]`);
                const buttonFinish = tr.querySelector(`td[data-name="performWorkFinishButton"] button[data-action="performWorkFinish"]`);


                if (button && buttonFinish) {
                    button.setAttribute('data-id', `${id}`);
                    buttonFinish.setAttribute('data-id', `${id}`);
                    if (isPerform === false) {
                        buttonFinish.disabled = true;
                        button.disabled = false;
                    } else {
                        buttonFinish.disabled = false;
                        button.disabled = true;
                    }
                } else {
                    console.warn(`Button not found for ID: ${id}`);
                }
            })
        }

        init () {
            super.init();
            this.listenTo(this.model, 'change:isPerform', this.enablePerformWorkButton)
        }
        afterRender () {
            super.afterRender();
            this.enablePerformWorkButton();
        }

        toggleButtons(disable) {
            const buttons = document.querySelectorAll(`
                td[data-name="performWorkButton"] button[data-action="performWork"],
                td[data-name="performWorkFinishButton"] button[data-action="performWorkFinish"]
            `);

            const buttonStates = Array.from(buttons).map(button => ({
                element: button,
                disabled: button.disabled,
            }));

            buttons.forEach(button => {
                button.disabled = disable;
            });

            return buttonStates;
        }

        restoreButtonStates(buttonStates) {
            buttonStates.forEach(({ element, disabled }) => {
                element.disabled = disabled;
            });
        }
    }
});