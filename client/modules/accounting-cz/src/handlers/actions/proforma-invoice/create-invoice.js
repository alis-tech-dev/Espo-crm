define(['action-handler'], ActionHandler => {

    return class extends ActionHandler{

        actionCreateInvoice() {

            const {view} = this;

            const dateTime = view.getDateTime();

            const options = {
                attributes: view.model.attributes
            };

            options.attributes.itemsIds = null;

            options.attributes.itemsRecordList = Object.values(
                
                options.attributes.itemsRecordList.reduce((acc, item) => {

                    const taxRate = item.taxRate ?? 0;
                    const withTax = item.withTax;
                    const key = `${taxRate}_${withTax}`;

                    if (!acc[key]) {

                        acc[key] = {
                            taxRate,
                            withTax,
                            unitPrice: 0,
                            quantity: 1,
                            unit: view.translate('pcs', 'units'),
                            name: "Odpočet zálohy VS:" + options.attributes.variableSymbol,
                            amount: 0,
                            taxAmount: 0,
                            amountWithTax: 0,
                            type: 'advanceDeduction'
                        };

                    }
                    
                    acc[key].unitPrice += item.unitPrice * item.quantity;
                    acc[key].amount += item.amount;
                    acc[key].taxAmount += item.taxAmount;
                    acc[key].amountWithTax += item.amountWithTax;

                    return acc;

                }, {})

            );

            // options.attributes.itemsRecordList.push(
            //     {
            //         "quantity": 1,
            //         "unitPrice": options.attributes.amount * -1,
            //         "amount": options.attributes.amount * -1,
            //         "taxRate": 0,
            //         "unit": "ks",
            //         "name": "Odpočet zálohy VS:" + options.attributes.variableSymbol,
            //     }
            // );

            console.log(this);
            options.attributes.assignedUserId = view.getUser().id;
            options.attributes.assignedUserName = view.getUser().get('name');
            options.attributes.proformaInvoiceId = options.attributes.id;
            options.attributes.proformaInvoiceName = options.attributes.name;
            options.attributes.dateInvoiced = dateTime.getToday();
            options.attributes.dueDate = dateTime.getToday();
            options.attributes.duzp = dateTime.getToday();
            options.attributes.skipFillDefaultValues = true;
            options.attributes.variableSymbol = null;
            options.attributes.number = null;
            options.attributes.id = null;
            options.attributes.revenueReceiptsIds = [];
            options.attributes.revenueReceiptsNames = [];

            const returnDispatchParams = {
                controller: view.scope,
                action: null,
                options: {
                    isReturn: true
                }
            };

            view.model.save({status: 'Paid'}, {patch: true});

            options.attributes.status = null;

            _.extend(options, {
                returnUrl: view.getRouter().getCurrentUrl(),
                returnDispatchParams: returnDispatchParams
            });

            view.getRouter().navigate('Invoice/create', {trigger: false});
            view.getRouter().dispatch('Invoice', 'create', options);

        }

    };

});
