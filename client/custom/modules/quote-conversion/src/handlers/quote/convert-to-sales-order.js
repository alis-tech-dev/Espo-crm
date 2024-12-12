define(['action-handler'], Dep => {
	return class extends Dep {
		async actionConvertToSalesOrder() {
			const model = this.view.model;

			const view = await this.view.createView(
				'modal',
				'quote-conversion:views/quote/modals/convert-to-sales-order',
				{
					entriesData: model.get('quoteEntryData'),
					itemsRecordList: model.get('itemsRecordList'),
				},
			);

			view.once('selected', async data => {
				view.close();

				await this.createSalesOrder(data[0], data[1]);
			});

			await view.render();
		}

		async createSalesOrder(items, entryData) {
			const itemFieldsToCopy = [
				'name',
				'quantity',
				'discount',
				'listPrice',
				'listPriceCurrency',
				'unitPrice',
				'unitPriceCurrency',
				'amount',
				'amountCurrency',
				'entryKey',
				'taxRate',
				'productId',
				'order',
			];
			
			const newItems = items.map(item => {
				const newItem = {};

				for (const field of itemFieldsToCopy) {
					newItem[field] = Espo.Utils.cloneDeep(item[field]);
				}

				return newItem;
			});

			Espo.Ui.notify(' ... ');

			const id = this.view.model.id;
			const quoteName = this.view.model.get("name")
			const response = await Espo.Ajax.getRequest(
				'QuoteConversion/salesOrderAttributes/' + id,
			);
			const priceType = this.view.model.get('priceListId');
			const priceTypeName = this.view.model.get('priceListName');
			const attributes = response.attributes;

			attributes['itemsRecordList'] = newItems;
			attributes['salesOrderEntryData'] = entryData;
			attributes['status'] = 'Draft';
			attributes['quoteId'] = id;
			attributes['quoteName'] = quoteName;
			attributes['priceList1Id'] = priceType;
			attributes['priceList1Name'] = priceTypeName;

			const router = this.view.getRouter();

			const url = '#SalesOrder/create';
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
			router.dispatch('SalesOrder', 'create', options);

			await this.updateQuoteItems(items);

			Espo.Ui.notify(false);
		}

		async updateQuoteItems(selectedItems) {
			const model = this.view.model;
			const itemsRecordList = model.get('itemsRecordList') || [];

			const updatedItemsRecordList = itemsRecordList.map(item => {
				const selectedItem = selectedItems.find(
					si => si.id === item.id,
				);
				if (selectedItem) {
					return { ...item, processed: true };
				}
				return item;
			});

			model.set('itemsRecordList', updatedItemsRecordList);
			await model.save(
				{ itemsRecordList: updatedItemsRecordList },
				{ patch: true },
			);

			await model.fetch();
		}

		init() {
			this.view.listenTo(this.view.model, 'change:status change:itemsRecordList', () => {
				this.handleButtonVisibility();
			});

			this.handleButtonVisibility();
		}

		handleButtonVisibility() {
			const status = this.view.model.get('status');
			const itemsRecordList = this.view.model.get('itemsRecordList') || [];

			const hasUnprocessedItems = itemsRecordList.some(item => !item.processed);

			if (status === 'Approved' && hasUnprocessedItems) {
				this.view.showHeaderActionItem('convertToSalesOrder');
			} else {
				this.view.hideHeaderActionItem('convertToSalesOrder');
			}
		}
	};
});

