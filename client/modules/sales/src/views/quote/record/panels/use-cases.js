/*********************************************************************************
 * Helou helou
 ***********************************************************************************/

Espo.define('sales:views/quote/record/panels/use-cases', 'views/record/panels/relationship', function (Dep) {

    return Dep.extend({

        actionCreateRelatedUseCase: function () {
            this.notify('Loading...');
            Espo.Ajax.getRequest('UseCase/action/getAttributesFromQuote', {
                quoteId: this.model.id
            }).done(function (attributes) {
                attributes['name'] = "";

                var viewName = this.getMetadata().get('clientDefs.UseCase.modalViews.edit') || 'views/modals/edit';
                this.createView('quickCreate', viewName, {
                    scope: 'UseCase',
                    relate: {
                        model: this.model,
                        link: 'quote',
                    },
                    sideDisabled: true,
                    attributes: attributes,
                }, function (view) {
                    view.render();
                    view.notify(false);
                    this.listenToOnce(view, 'after:save', function () {
                        this.model.fetch();
                        this.collection.fetch();
                    }, this);
                }.bind(this));
            }.bind(this));
        }
    });
});
