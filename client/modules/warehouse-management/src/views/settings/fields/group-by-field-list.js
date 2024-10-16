define('warehouse-management:views/settings/fields/group-by-field-list', ['views/fields/multi-enum'], function (Dep) {
    return Dep.extend({

        allowedFieldsTypes: [
            'varchar',
            'int',
            'float',
            'date',
            'dateTime',
            'dateTimeOptional',
            'enum',
            'currency',
        ],

        setupOptions: function () {
            const fields = this.getMetadata().get(['entityDefs', 'WarehouseItem', 'fields']);

            this.params.options = Object.keys(fields).filter(
                field => {
                    const fieldDef = fields[field];

                    return !fieldDef.notStorable && this.allowedFieldsTypes.includes(fieldDef.type);
                }
            );
        },

        setupTranslation: function () {
            const translations = {};

            this.params.options.forEach(
                field => translations[field] = this.translate(field, 'fields', 'WarehouseItem')
            );

            this.translatedOptions = translations;
        }

    });
});
