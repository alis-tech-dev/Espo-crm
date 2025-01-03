define(['views/fields/base'], Dep => {
	return class extends Dep {
		listTemplate = 'main:production-order/fields/use-case-number/list';

		events = {
			'click [data-action="useCaseNumber"]': function (e) {
				this.CaseNumber(e);
			},
		};

		CaseNumber(e) {
			const useCaseNumber = this.model.get('useCaseNumber');

			const rows = document.querySelectorAll('.list-row');
			let targetRow = null;

			rows.forEach(row => {
				const numberCell = row.querySelector('td[data-name="number"] .cell-wrapper button');
				if (numberCell && numberCell.childNodes[0].textContent.trim() === useCaseNumber) {
					targetRow = row;
				}
			});

			if (targetRow) {
				const rect = targetRow.getBoundingClientRect();
				const scrollY = window.scrollY || document.documentElement.scrollTop;
				const offset = window.innerHeight * 0.25;
				const targetY = rect.top + scrollY - offset;

				window.scrollTo({
					top: targetY,
					behavior: 'smooth'
				});
				targetRow.classList.add('highlight');
				let blink = true;
				const interval = setInterval(() => {
					if (blink) {
						targetRow.classList.remove('highlight');
					} else {
						targetRow.classList.add('highlight');
					}
					blink = !blink;
				}, 100);

				setTimeout(() => {
					clearInterval(interval);
					targetRow.classList.remove('highlight');
				}, 1000);
			}
		}

		init() {
			super.init();
		}
		updateUseCaseButtons() {
			const view = this.getParentView().getParentView().getParentView();
            const orders = view.model.get('productionOrdersRecordList');

            orders.forEach((order) => {
                const id = order.id;
                const tr = document.querySelector(`tr[data-id="${id}"]`);
                const button = tr.querySelector(`td[data-name="UseCase"] button[data-action="useCaseNumber"]`);

                if (button) {
                    button.setAttribute('data-id', `${id}`);
					button.innerHTML = `${order.useCaseNumber}<br><span>🔍</span>`;
                }
            })
		}
		afterRender () {
            super.afterRender();
            this.updateUseCaseButtons();
        }
	};
});
