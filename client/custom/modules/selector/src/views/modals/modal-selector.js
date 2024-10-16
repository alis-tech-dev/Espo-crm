define(['views/modal'], Dep => {
    return class extends Dep {
        template = 'selector:views/selector/modals/modal-selector';

        buttonList = [
            {
                name: 'cancel',
                label: 'Cancel',
                style: 'danger'
            }
        ];

        setup () {

        }
        afterRender () {
            const resultContainer = document.querySelector('.hello-world-modal');
            const modalFooter = document.querySelector('.modal-footer');
            const cancelButton = document.querySelector('.btn-group.main-btn-group button[data-name="cancel"]');
            if (cancelButton) {
                cancelButton.id = 'modal-cancel';
            }
            if (resultContainer && modalFooter && cancelButton) {
                resultContainer.appendChild(cancelButton);
                modalFooter.remove();
            }
            const modalDialog = document.querySelector('.modal-dialog');
            if (modalDialog) {
                modalDialog.id = 'modal-selector';
            }
            const styleLink = document.createElement('link');
            styleLink.rel = 'stylesheet';
            styleLink.href = 'client/custom/modules/selector/css/styles.css';
            styleLink.id = 'selector-stylesheet';
            document.head.appendChild(styleLink);
            this.setupEventListeners()
            this.observeSaveButton(resultContainer);
        }
        loadScript(src, type = 'text/javascript') {
            return new Promise((resolve, reject) => {
                const uniqueSrc = `${src}?_=${new Date().getTime()}`;
                const script = document.createElement('script');
                script.src = uniqueSrc;
                script.type = type;
                script.onload = () => {
                    resolve();
                };
                script.onerror = () => {
                    console.error(`Error loading script ${uniqueSrc}`);
                    reject(new Error(`Script load error for ${uniqueSrc}`));
                };
                document.head.appendChild(script);
            });
        }

        observeSaveButton(container) {
            const observer = new MutationObserver(mutations => {
                mutations.forEach(mutation => {
                    mutation.addedNodes.forEach(node => {
                        if (node.nodeType === Node.ELEMENT_NODE && node.matches('.save-button-modal')) {
                            node.addEventListener('click', () => {
                                this.getResult(node);
                            });
                        }

                        if (node.nodeType === Node.ELEMENT_NODE) {
                            const buttons = node.querySelectorAll('.save-button-modal');
                            buttons.forEach(button => {
                                button.addEventListener('click', () => {
                                    this.getResult(node);
                                });
                            });
                        }
                    });
                });
            });

            observer.observe(container, { childList: true, subtree: true });
        }

        setupEventListeners() {
            Promise.all([
                this.loadScript('client/custom/modules/selector/src/views/modals/modal-main.js', "module"),
                this.loadScript("client/custom/modules/selector/src/views/modals/modal-scripts.js")
            ]).then(() => {
                const greenButton = document.querySelector('.green-button');
                const blueButton = document.querySelector('.blue-button');
                const redButton = document.querySelector('.red-button');

                greenButton.addEventListener('click', window.calculate);
                blueButton.addEventListener('click', window.showInfo);
                redButton.addEventListener('click', window.resetEntries);

            }).catch(error => {
                console.error('Error loading scripts:', error);
            });
        }
        getResult (object) {
            const buttonId = object.id;
            const parts = buttonId.split('-');
            const firstPart = parts[0];
            const secondPart = parts[1];
            const parentElement = object.closest('tr');

            const projector = parentElement.children[0].textContent;
            const lens = parentElement.children[1].textContent;
            const height = document.getElementById('working-height').value;
            const illuminance = parentElement.children[2].textContent;
            const symbolIlluminance = parentElement.children[3].textContent;
            const price = parentElement.children[4].textContent;
            const symbolSize = parentElement.children[5].textContent;

            const data = {
                projector: projector,
                lens: lens,
                illuminance: illuminance,
                symbolIlluminance: symbolIlluminance,
                price: price,
                symbolSize: symbolSize,
                height: height
            };

            this.ajaxPostRequest('Selector/createSelector', data)
                .then(_response => {
                    const status = _response.status;

                    if (status === 'Success') {
                        Espo.Ui.success("Result saved successfully.");
                    } else {
                        Espo.Ui.error('status:', status);
                    }
                })
                .catch(error => {
                    Espo.Ui.error('Error:', error);
                });

        }

        processData () {}

        data () {}

        actionCancel () {
            this.close();
        }
    };
});
