define(['views/fields/base'], function (Dep) {
    return class extends Dep {
        templateContent =
            '<button class="btn btn-default" data-action="openDocument">Otevřít</button>';

        events = {
            'click [data-action="openDocument"]': function () {
                this.openDocument();
            },
        };

        openDocument() {
            const id = this.model.get('id');

            this.getRouter().navigate(`Document/onlyOffice/${id}`, {
                trigger: true,
            });
        }

        fetch() {
            return {};
        }
    };
});
