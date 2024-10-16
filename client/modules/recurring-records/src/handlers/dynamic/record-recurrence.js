define(['dynamic-handler'], Dep => {
    return class extends Dep {
        init() {
            this.onChangeInfinite();
            this.onChangeGenerateInBatches();
        }

        onChangeInfinite() {
            if (this.model.get('infinite')) {
                this.model.set('generateInBatches', true);

                this.recordView.setFieldReadOnly('generateInBatches');
                this.recordView.setFieldReadOnly('until');
                this.recordView.setFieldNotRequired('until');

                return;
            }

            this.model.set('generateInBatches', false);

            this.recordView.setFieldNotReadOnly('generateInBatches');
            this.recordView.setFieldNotReadOnly('until');
            this.recordView.setFieldRequired('until');
        }

        onChangeGenerateInBatches() {
            if (this.model.get('generateInBatches')) {
                this.recordView.setFieldNotReadOnly('generateInAdvance');
                this.recordView.setFieldRequired('generateInAdvance');

                return;
            }

            this.recordView.setFieldReadOnly('generateInAdvance');
            this.recordView.setFieldNotRequired('generateInAdvance');
        }
    };
});
