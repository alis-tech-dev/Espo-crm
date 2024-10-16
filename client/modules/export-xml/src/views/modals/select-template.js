define('export-xml:views/modals/select-template', ['views/modals/select-records'], function (Dep) {
    return Dep.extend({

        multiple: false,

        createButton: false,

        searchPanel: false,

        scope: 'XmlTemplate',

        loadSearch: function () {
            Dep.prototype.loadSearch.call(this);

            this.searchManager.setAdvanced({
                entityType: {
                    type: 'equals',
                    value: this.options.entityType,
                }
            });

            this.collection.where = this.searchManager.getWhere();
        },

        afterRender: function () {
            Dep.prototype.afterRender.call(this);

            let firstLinkElement = this.$el.find('a.link').first().get(0);

            if (firstLinkElement) {
                setTimeout(() => firstLinkElement.focus({preventScroll: true}), 10);
            }
        }

    });
});
