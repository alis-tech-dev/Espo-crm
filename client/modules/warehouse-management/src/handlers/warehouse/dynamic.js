define('warehouse-management:handlers/warehouse/dynamic', ['dynamic-handler'], function (Dep) {
    return Dep.extend({

        init: function () {
            if (!this.model.isNew()) {
                this.recordView.setFieldReadOnly('type');
            }

            this.controlPositions();
        },

        onChangeType: function () {
            this.controlPositions();
        },

        controlPositions: function () {
            const type = this.model.get('type');

            if (type !== 'Positional') {
                this.recordView.hidePanel('positions');
            } else {
                this.recordView.showPanel('positions');
            }
        }

    });
});
