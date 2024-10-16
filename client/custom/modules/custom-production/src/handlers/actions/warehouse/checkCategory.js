define(['action-handler'], Dep => {
    return class extends Dep {
        init() {
            this.controlVisibility();
            this.view.listenTo(
                this.view.model,
                'change:productCategoryName',
                this.checkCategory.bind(this)
            );
        }
        checkCategory() {
            const id = this.view.model.get('id');
            const name = this.view.model.get('name');
            const categoryName = this.view.model.get('productCategoryName');
            const categoryId = this.view.model.get('productCategoryId');
            this.view.ajaxPostRequest(`Warehouse/changeCategory/${id}/${categoryId}`)
                .then(_response => {
                    if (_response.status === 'Success') {
                        this.triggerUpdate();
                        setTimeout(() => {
                            Espo.Ui.success(`Category for product "${name}" changed to ${categoryName}`);
                        }, 3000);
                    }
                })
            this.controlVisibility();
        }

        triggerUpdate() {
            const updateButton = document.querySelector('.inline-save-link');
            if (updateButton) {
                updateButton.click();
            } else {
                console.warn('Update button not found.');
            }
        }

       controlVisibility() {
            this.view.hideHeaderActionItem('checkCategory');
        }

    }
});