define('autocrm:views/admin/layouts/fields/select-related-attribute', ['views/fields/multi-enum'], function (Dep) {
	return Dep.extend({
        getItemList: function () {
            const itemList = [];
            this.entityType = this.options.scope;
            const links = this.links || this.getMetadata().get(['entityDefs', this.entityType, 'links']) || {};

            // Sort the links by their translated name for greater user-experience
            const linkList = Object.keys(links).sort(
                function (v1, v2) {
                    return (this.translatedLinks[v1] || this.translate(v1, 'links', this.entityType)).localeCompare(
                        this.translatedLinks[v2] || this.translate(v2, 'links', this.entityType),
                    );
                }.bind(this),
            );

            // By converting the array to a set, we can check if a link is already added to the list in O(1) time
            const enabledAttributesSet = new Set();
            this.options.enabledFields.forEach(field => {
                enabledAttributesSet.add(field.name);
            });

            linkList.forEach(function (link) {
                // in case of an accidental editing of the metadata
                if (!links[link]) {
                    return;
                }

                const type = links[link].type;
                if (type !== 'belongsTo') return;

                const scope = links[link].entity;
                if (!scope) return;

                const fields = this.fields[scope] || Object.keys(this.getMetadata().get('entityDefs.' + scope + '.fields') || {});
                fields.sort(
                    function (v1, v2) {
                        return (this.translatedFields[scope] && this.translatedFields[scope][v1] || this.translate(v1, 'fields', scope)).localeCompare(
                            this.translatedFields[scope] && this.translatedFields[scope][v2] || this.translate(v2, 'fields', scope),
                        );
                    }.bind(this),
                );
                fields.forEach(function (item) {
                    const key = link + '.' + item;

                    // Already in the list, skip
                    if (!enabledAttributesSet.has(key)) {
                        itemList.push(key);
                    }
                }, this);
            }, this);

            return itemList;
        },

        setupTranslatedOptions: function () {
            this.translatedOptions = this.translatedOptions || {};

            this.params.options.forEach(function (item) {
                const field = item.split('.')[1];
                const link = item.split('.')[0];
                const scope = this.getMetadata().get(['entityDefs', this.entityType, 'links', link, 'entity']);
                this.translatedOptions[item] =
                    (this.translatedLinks[link] || this.translate(link, 'links', this.entityType)) +
                    ' > ' +
                    (this.translatedFields[scope] && this.translatedFields[scope][field] || this.translate(field, 'fields', scope));
            }, this);
        },

		setupOptions: function () {
			Dep.prototype.setupOptions.call(this);

			this.params.options = this.getItemList();
			this.setupTranslatedOptions();
		},

		afterRender: function () {
			Dep.prototype.afterRender.call(this);

			// Focus on the element, so that the hint pops up immediately
			if (this.$element && this.$element[0] && this.$element[0].selectize) {
				this.$element[0].selectize.focus();
			}
		},

		fetch: function () {
			const data = {},
				list = this.$element.val().split(this.itemDelimiter);

			if (!list.length) {
				return data;
			}

			data[this.name] = list[0];
			data[this.name + 'Translated'] = this.translatedOptions[list[0]];
			return data;
		},
	});
});
