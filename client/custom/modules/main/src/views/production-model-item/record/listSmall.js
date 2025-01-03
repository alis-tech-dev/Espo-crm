define(['views/fields/link-multiple-with-primary'], Dep => {
    return class extends Dep {
        recolorRows() {
            const billOfMaterialsIds = this.model.get('billOfMaterialsIds');
            const ava = this.model.get('availableQuantity');
            const produced = this.model.get('quantityProduced');
            const taken = this.model.get('fromWarehouse');
            const totalProduced = produced + taken;
            const planned = this.model.get('quantityPlanned');


            const modelId = this.model.get('id');
            const $mainRow = document.querySelector(`a[data-id="${modelId}"]`);
            if ($mainRow) {
                if (ava < 1) {
                    $mainRow.style.background = '#ffcccc';
                    $mainRow.style.borderRadius = '5px';
                    $mainRow.style.padding = '0 5px';

                }
                if (planned === totalProduced) {
                    $mainRow.style.background = '#D3F6DB';
                    $mainRow.style.borderRadius = '5px';
                    $mainRow.style.padding = '0 5px';

                }
            }

            if (billOfMaterialsIds) {
                for (const id of billOfMaterialsIds) {
                    this.ajaxGetRequest(`ProductionOrder/checkQuantity/${id}`)
                        .then(_response => {
                            if (_response.status === 'Error') {
                                const row = this.$el.find(`a[data-id="${id}"]`);
                                row.css({
                                    background: '#ffcccc',
                                    'border-radius': '5px',
                                    padding: '0 5px'
                                });
                                const performWork = document.querySelector(`.btn[data-id="${modelId}"][id="performwork"]`);
                                if (performWork && !performWork.disabled) {
                                    performWork.disabled = true;
                                }
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
