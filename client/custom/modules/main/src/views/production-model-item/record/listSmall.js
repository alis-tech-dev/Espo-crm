define(['views/fields/link-multiple-with-primary'], Dep => {
    return class extends Dep {
        recolorRows() {
            const billOfMaterialsIds = this.model.get('billOfMaterialsIds');
            const brno = this.model.get('availableBrno');
            const pv = this.model.get('availablePv');

            const modelId = this.model.get('id');
            if (brno + pv < 1) {
                const $mainRow = document.querySelector(`a[data-id="${modelId}"]`);
                if ($mainRow) {
                    $mainRow.style.background = '#ffcccc';
                    $mainRow.style.borderRadius = '5px';
                    $mainRow.style.padding = '0 5px';
                }
            }
            if (billOfMaterialsIds) {
                for (const id of billOfMaterialsIds) {
                    this.ajaxGetRequest(`ProductionOrder/checkQuantity/${id}`)
                        .then(_response => {
                            if (_response.status === 'Error') {
                                const $row = this.$el.find(`a[data-id="${id}"]`);
                                $row.css({
                                    background: '#ffcccc',
                                    'border-radius': '5px',
                                    padding: '0 5px'
                                });
                            }
                        });
                }
            }
        }

        afterRender() {
            super.afterRender();
            this.recolorRows();
        }
    };
});
