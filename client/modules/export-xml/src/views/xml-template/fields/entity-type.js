define('export-xml:views/xml-template/fields/entity-type', ['views/fields/entity-type'], function (Dep) {
    return Dep.extend({

        checkAvailability: function (entityType) {
            const defs = this.scopesMetadataDefs[entityType] || {};

            if (defs.pdfTemplate) {
                return true;
            }

            if (defs.entity && defs.object) {
                return true;
            }
        },

    });
});
