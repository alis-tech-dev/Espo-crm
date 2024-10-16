define(['views/main'], Dep => {
    return class extends Dep {
        el = '#main';

        templateContent =
            '<div id="editorOnlyOffice"></div><button id="exitButton" style="position: absolute; top: 2px; right: 25px;">X</button>';

        isLoaded = false;

        /**
         * @property {?object} data - Object containing file data.
         *
         * @property {string} data.key - Key.
         * @property {string} data.actualKey - ActualKey.
         * @property {('word'|'cell'|'slide')} data.type - Content type for the editor.
         * @property {string} data.fileType - File mime-type.
         * @property {string} data.name - The file name.
         */
        data = null;

        setup() {
            super.setup();

            this.id = this.options.id;

            this.ajaxGetRequest('OnlyOffice/action/openDocument', {
                id: this.id,
            }).then(data => {
                this.data = data;

                if (this.isRendered() || this.isBeingRendered()) {
                    this.isLoaded = true;
                    this.reRender();
                }
            });

            this.once('remove', () => {
                this.$body.removeClass('only-office');
            });
        }

        afterRender() {
            this.$body = $('body');
            this.$body.addClass('only-office');

            if (this.isLoaded) {
                const scriptSrc = this.getScriptSrc();

                if (!scriptSrc) {
                    this.$el.html(
                        this.translate(
                            'scriptSrcMissing',
                            'messages',
                            'OnlyOffice'
                        )
                    );
                    return;
                }

                const script = document.createElement('script');

                script.src = scriptSrc;
                script.setAttribute('async', 'async');

                document.head.appendChild(script);

                script.addEventListener('load', () => {
                    window.docEditor = new DocsAPI.DocEditor(
                        'editorOnlyOffice',
                        this.getOptions()
                    );

                    const exitButton = document.getElementById('exitButton');
                    if (exitButton) {
                        exitButton.addEventListener('click', () => {
                            const router = this.getRouter();

                            router.confirmLeaveOut = true;

                            router.checkConfirmLeaveOut(() => {
                                window.docEditor.destroyEditor();
                                router.navigate(`Document/view/${this.id}`, {
                                    trigger: true,
                                });
                            });
                        });
                    }
                });
            }
        }

        getScriptSrc() {
            return this.getHelper().getAppParam('onlyOfficeScriptSrc');
        }

        getOptions() {
            const basePath = this.getConfig().get('siteUrl');

            const key = this.data.key;
            const data = this.data;
            const user = this.getUser();

            return {
                document: {
                    fileType: data.fileType,
                    key: data.actualKey,
                    title: data.name,
                    url: `${basePath}/?entryPoint=getFileOnlyOffice&data=${key}`,
                },
                documentType: data.type,
                editorConfig: {
                    callbackUrl: `${basePath}/api/v1/OnlyOffice/callback/${key}`,
                    customization: {
                        forcesave: true,
                    },
                    lang: 'cs', //TODO: generalize?
                    user: {
                        id: user.get('id'),
                        name: user.get('name'),
                    },
                },
                height: '100vh',
                width: '100%',
            };
        }
    };
});
