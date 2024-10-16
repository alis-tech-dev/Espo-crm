define(['views/fields/enum'], Dep => {
    return class extends Dep {
        setup() {
            console.log('setup');
            super.setup();

            if (!this.model.isNew()) {
                this.setReadOnly(true);
            }

            this.viewValue = this.model.get('view');
        }

        setupOptions() {
            console.log('setupOptions');
            super.setupOptions();

            this.setupOptionsByLink();
        }

        setupOptionsByLink() {
            console.log('setupOptionsByLink');
            console.log(this);
            this.typeList = this.typeList || this.getMetadata().get(['fields', 'foreign', 'fieldTypeList']);

            const scope = this.model.scope;
            var fields = this.fields || this.getMetadata().get(['entityDefs', scope, 'fields']) || {};

            this.params.options = Object.keys(Espo.Utils.clone(fields)).filter(item => {
                var type = fields[item].type;

                if (!~this.typeList.indexOf(type)) {
                    return;
                }

                if (fields[item].disabled || fields[item].utility || fields[item].directAccessDisabled) {
                    return;
                }

                return true;
            });

            this.translatedOptions = this.translatedOptions || {};

            this.params.options.forEach(item => {
                this.translatedOptions[item] = this.translatedOptions[item] || this.translate(item, 'fields', scope);
            });

            this.params.options = this.params.options.sort((v1, v2) => {
                return (this.translatedOptions[v1] || this.translate(v1, 'fields', scope)).localeCompare(this.translatedOptions[v2] || this.translate(v2, 'fields', scope));
            });

            this.params.options.unshift('');
        }

        fetch() {
            console.log('fetch');
            var data = super.fetch();

            if (this.model.isNew()) {
                if (this.viewValue) {
                    data['view'] = this.viewValue;
                }
            }

            return data;
        }
    };
});