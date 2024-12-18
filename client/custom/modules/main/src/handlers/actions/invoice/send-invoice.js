define(['action-handler'], Dep => {
    return class extends Dep {
        actionSendInvoice() {
            this.view.hideHeaderActionItem('SendInvoice');
            this.view.model.set('processed', false);
            this.view.model.set('sendStatus', "Pending");
            this.view.model.save();
        }

        init() {
            this.view.hideHeaderActionItem('SendInvoice');
            this.view.model.fetch()
                .then(() => {
                    this.controlVisibility();
                })
        }

        controlVisibility() {
            const processed = this.view.model.get('processed');
            const sendStatus = this.view.model.get('sendStatus');
            console.log("Processed:", processed);
            console.log("SendStatus:", sendStatus);

            if (processed === true && sendStatus === "Not Sent") {
                this.view.showHeaderActionItem('SendInvoice');
            } else {
                this.view.hideHeaderActionItem('SendInvoice');
            }
        }
    };
});
