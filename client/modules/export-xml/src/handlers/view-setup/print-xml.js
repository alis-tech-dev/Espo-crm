define('export-xml:handlers/view-setup/print-xml', [], function () {

    const Handler = function (view) {
        this.view = view;
    };

    _.extend(Handler.prototype, {

        process: function () {
            const entityTypeList = this.view.getHelper().getAppParam('xmlTemplateEntityTypeList') || [];

            if (entityTypeList.includes(this.view.scope)) {
                this.view.dropdownItemList.push({
                    label: 'Print to XML',
                    name: 'printXml',
                    data: {
                        handler: 'export-xml:handlers/actions/print-xml'
                    }
                });
            }
        }

    });

    _.extend(Handler.prototype, Backbone.Events);

    return Handler;
});
