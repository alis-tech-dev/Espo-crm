define(['views/fields/base'], Dep => {
	return class extends Dep {
		listTemplate = 'main:production-order/fields/use-case-number/list';

		events = {
			'click [data-action="useCaseNumber"]': function (e) {
				this.CaseNumber(e);
			},
		};

		CaseNumber(e) {
			const view = this.getParentView().getParentView().getParentView();
            const useCases = view.model.get('productionUseCaseRecordList');
			console.log(this.model);
			const id = this.model.get('id');
			const useCaseNumber = this.model.get('useCaseNumber');

			const rows = document.querySelectorAll('.list-row');
			let targetRow = null;

			rows.forEach(row => {
				const numberCell = row.querySelector('td[data-name="number"] .cell-wrapper span');
				if (numberCell && numberCell.textContent.trim() === useCaseNumber) {
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
				const element = document.querySelector(`td[data-name="number"] .cell-wrapper span[title="${useCaseNumber}"]`);
				element.classList.add('highlight');
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
				element.classList.remove('highlight');
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
                } else {
                    console.warn(`Button not found for ID: ${id}`);
                }
            })
		}
		afterRender () {
            super.afterRender();
            this.updateUseCaseButtons();
        }
	};
});
