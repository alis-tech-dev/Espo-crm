define(['controller'], Dep => {
    return class extends Dep {
        actionOpenDocument(options) {
            this.main(
                'only-office:views/only-office',
                { id: options.id },
                view => view.render()
            );
        }
    };
});
