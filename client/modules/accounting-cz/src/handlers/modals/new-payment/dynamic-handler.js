define(['dynamic-handler'], DynamicHandler => {

    return class extends DynamicHandler{

        onChangePaidOn(_, value) {

            const today = this.recordView.getDateTime().getToday();

            if (value !== today) {

                this.recordView.hideButton('paidToday');
                this.recordView.showButton('paid');

            } else {
                    
                this.recordView.hideButton('paid');
                this.recordView.showButton('paidToday');

            }
    
        }

        onChangeAmount(model, value) {

            if(model.get('remainingToPay') <= value) {

                model.set('markAsPaid', true);

            } else {

                model.set('markAsPaid', false);

            }
    
        }

    };

});
