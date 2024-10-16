define(['action-handler'], Dep => {
	return class extends Dep {
		async actionConvertToQuote() {
			const model = this.view.model;
			await this.createQuote;
		}

		async createQuote() {

			console.info('createQuote');

			Espo.Ui.notify(' ... ');

			const id = this.view.model.id;
			const response = await Espo.Ajax.getRequest(
				'QuoteConversion/quoteAttributes/' + id,
			);

			console.info(response);

			const attributes = response.attributes;

			attributes['status'] = 'Submitted';

			const router = this.view.getRouter();

			const url = '#Quote/create';
			const returnDispatchParams = {
				controller: 'Quote',
				action: 'view',
				options: {
					id,
					isReturn: true,
				},
			};

			const options = {
				attributes,
				focusForCreate: true,
				returnUrl: router.getCurrentUrl(),
				returnDispatchParams: returnDispatchParams,
			};

			router.navigate(url, { trigger: false });
			router.dispatch('Quote', 'create', options);

			Espo.Ui.notify(false);
		}
	};
});
