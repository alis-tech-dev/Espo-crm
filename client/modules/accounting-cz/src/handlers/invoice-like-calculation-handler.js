define(['accounting:handlers/invoice-like-calculation-handler'], AcountingCalculationHandler => {

    return class extends AcountingCalculationHandler {
	
		processDataBeforeSet(data) {

            if(this.model.hasField('paid')){

                const remainingToPay = data.grandTotalAmount - this.model.get('paid');

            data.remainingToPay = remainingToPay;

            }
            
		}

	}
});
