define(['action-handler'], Dep => {
    return Dep.extend({

        /**
         * @abstract
         */
        state: null,

        /**
         * @abstract
         */
        finalStates: [],

        /**
         * @abstract
         */
        name: null,

        init: function () {
            this.checkVisibility();

            this.view.listenTo(this.view.model, 'change:status', () => this.checkVisibility());
        },

        checkVisibility: function () {
            if (this.finalStates.includes(this.view.model.get('status'))) {
                this.view.hideHeaderActionItem(this.name);
            } else {
                this.view.showHeaderActionItem(this.name);
            }
        },

        actionProcess: function () {
            if (this.state === null) return;

            this.view.confirm(this.view.translate('confirmation', 'messages'), () => {
                this.view.notify('Please wait...');

                const result = this.view.model.save({
                    status: this.state,
                }).then(() => {
                    this.view.notify('Done', 'success');
                });

                /*
                 * Might be jQuery ajax result (Espo <= 7.5) or Promise
                 * @TODO: remove in the future
                 */
                const finallyMethod = 'finally' in result ? 'finally' : 'always';

                result[finallyMethod](() => {
                    this.view.model.fetch();
                });
            });
        }

    });
});
