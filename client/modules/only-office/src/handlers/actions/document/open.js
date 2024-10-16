define(['action-handler'], Dep => {
    return class extends Dep {
        actionOpenDocument() {
            const documentId = this.view.model.get('id');

            this.view
                .getRouter()
                .navigate(`Document/onlyOffice/${documentId}`, {
                    trigger: true,
                });
        }

        init() {
            let fileName = this.view.model.get('fileName');

            // Support for multiple files
            if (!fileName) {
                const firstFileId = this.view.model.get('filesIds')[0];

                if (firstFileId) {
                    fileName = this.view.model.get('filesNames')[firstFileId];
                }
            }

            if (!fileName || !this.isFileExtensionAllowed(fileName)) {
                this.view.hideHeaderActionItem('openDocument');
            } else {
                this.view.showHeaderActionItem('openDocument');
            }
        }

        isFileExtensionAllowed(fileName) {
            const extension = fileName.split('.').pop();

            return this.view
                .getHelper()
                .getAppParam('onlyOfficeAllowedExtensions')
                .includes(extension);
        }
    };
});
