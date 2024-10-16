define('export-xml:handlers/actions/print-xml', ['action-handler'], function (Dep) {
    return Dep.extend({

        actionPrintXml: function () {
            this.view.createView('xmlTemplate', 'export-xml:views/modals/select-template', {
                entityType: this.view.model.name,
            }, view => {
                view.render();

                this.view.listenToOnce(view, 'select', model => {
                    this.view.clearView('xmlTemplate');

                    const url = $.param({
                        entryPoint: 'xml',
                        entityType: this.view.model.name,
                        entityId: this.view.model.id,
                        templateId: model.id,
                    });

                    window.open(
                        '?' + url, '_blank'
                    );
                });
            });
        }

    });
});
