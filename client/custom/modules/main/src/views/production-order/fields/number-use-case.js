define(['views/fields/base'], Dep => {
    return class extends Dep {
        listTemplate = 'main:production-order/fields/use-case-number/use-case-list';

        events = {
            'click [data-action="numberUseCase"]': function (e) {
                this.NumberCase(e);
            },
        };

        NumberCase(e) {
            const useCaseNumber = this.model.get('number');
            const rows = document.querySelectorAll('.list-row');
            let targetRow = null;
            const targetRows = [];
            const allRows = [];

            rows.forEach(row => {
                const planned = row.querySelector('td[data-name="quantityPlanned"] .cell-wrapper span');
                const produced = row.querySelector('td[data-name="totalProduced"] .cell-wrapper span');

                if (planned && produced) {
                    const quantityPlanned = parseFloat(planned.textContent.trim());
                    const quantityProduced = parseFloat(produced.textContent.trim());
                    const quantity = quantityPlanned - quantityProduced;
                    const numberCell = row.querySelector('td[data-name="UseCase"] .cell-wrapper button');
                    if (numberCell && numberCell.childNodes[0].textContent.trim() === useCaseNumber) {
                        if (quantity !== 0) {
                            targetRows.push(row);
                        } else {
                            allRows.push(row);
                        }
                    }
                }
            });

            if (targetRows.length > 0) {
                targetRow = targetRows[0];
            }
            if (targetRow) {
                const rect = targetRow.getBoundingClientRect();
                const scrollY = window.scrollY || document.documentElement.scrollTop;
                const offset = window.innerHeight * 0.25;
                const targetY = rect.top + scrollY - offset;

                window.scrollTo({
                    top: targetY,
                    behavior: 'smooth'
                });
                const allTargetRows = [...targetRows, ...allRows];
                if (allTargetRows.length > 0) {
                    allTargetRows.forEach(targetRow => {
                        targetRow.classList.add('highlight');
                    });

                    let blink = true;
                    const interval = setInterval(() => {
                        allTargetRows.forEach(targetRow => {
                            if (blink) {
                                targetRow.classList.remove('highlight');
                            } else {
                                targetRow.classList.add('highlight');
                            }
                        });
                        blink = !blink;
                    }, 100);

                    setTimeout(() => {
                        clearInterval(interval);
                        allTargetRows.forEach(targetRow => {
                            targetRow.classList.remove('highlight');
                        });
                    }, 1000);
                }
            }
        }

        init() {
            super.init();
        }
        updateUseCaseButtons() {
            const view = this.getParentView().getParentView().getParentView();
            const orders = view.model.get('productionUseCasesRecordList');

            orders.forEach((order) => {
                const id = order.id;
                const tr = document.querySelector(`tr[data-id="${id}"]`);
                const button = tr.querySelector(`td[data-name="number"] button[data-action="numberUseCase"]`);

                if (button) {
                    button.setAttribute('data-id', `${id}`);
                    button.innerHTML = `${order.number}<br><span>🔍</span>`;
                }
            })
        }
        afterRender () {
            super.afterRender();
            this.updateUseCaseButtons();
        }
    };
});
