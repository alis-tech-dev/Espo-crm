define(['action-handler'], Dep => {
    return class extends Dep {
        async actionSelectorMain() {
            const view = await this.view.createView(
            'modal',
            'selector:views/modals/modal-selector',
            {}
            );
            await view.render();
        }
    };
});