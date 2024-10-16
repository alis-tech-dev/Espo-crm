define(['views/fields/link'], Dep => {
	return class extends Dep {
		getSelectFilters() {
			if (!this.model.get('accountId')) {
				return null;
			}

			return {
				account: {
					type: 'equals',
					attribute: 'accountId',
					value: this.model.get('accountId'),
					data: {
						type: 'is',
						nameValue: this.model.get('accountName'),
					},
				},
			};
		}

		getAutocompleteUrl() {
			let url =
				this.foreignScope +
				'?maxSize=' +
				this.getAutocompleteMaxCount();

			if (!this.forceSelectAllAttributes) {
				const mandatorySelectAttributeList =
					this.mandatorySelectAttributeList ||
					this.panelDefs.selectMandatoryAttributeList;

				let select = ['id', 'name'];

				if (mandatorySelectAttributeList) {
					select = select.concat(mandatorySelectAttributeList);
				}

				url += '&select=' + select.join(',');
			}
			const filters = this.getSelectFilters();

			if (filters) {
				url += '&' + $.param({ where: filters });

				return url;
			}

			const boolList = [
				...(this.getSelectBoolFilterList() || []),
				...(this.panelDefs.selectBoolFilterList || []),
			];

			const primary =
				this.getSelectPrimaryFilterName() ||
				this.panelDefs.selectPrimaryFilterName;

			if (boolList.length) {
				url += '&' + $.param({ boolFilterList: boolList });
			}

			if (primary) {
				url += '&' + $.param({ primaryFilter: primary });
			}

			return url;
		}
	};
});
