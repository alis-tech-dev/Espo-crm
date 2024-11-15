define(['dynamic-handler'], Dep => {
	return class extends Dep {
		init() {
			this.controlModelFields();

		}

		async onChangeProductionModelId(_model, _val, options) {
			if (options.ui) {
				this.loadProductionModel();
			}

			this.controlModelFields();
		}

		async onChangeProductId(model, _val, options) {
			if (options.ui) {
				this.recordView.getModelFactory().create('Product', product => {
					product.id = model.get('productId');

					product.fetch().then(product => {
						const attributes = {
							productionModelId: product.defaultProductionModelId,
							productionModelName:
								product.defaultProductionModelName,
						};

						if (!this.model.get('name')) {
							attributes.name = product.name;
						}

						this.model.set(attributes);
					});
				});
			}
		}

		controlModelFields() {
			const id = this.model.get('productionModelId');

			if (!id) {
				this.recordView.setFieldNotReadOnly('operations');
				this.recordView.setFieldNotReadOnly('billOfMaterials');
			} else {
				this.recordView.setFieldReadOnly('operations');
				this.recordView.setFieldReadOnly('billOfMaterials');
			}
		}

		async loadProductionModel() {
			const id = this.model.get('productionModelId');

			if (!id) {
				return;
			}

			Espo.Ui.notify(' ... ');

			const productionModel = await this.recordView
				.getModelFactory()
				.create('ProductionModel');

			productionModel.id = id;

			await productionModel.fetch();

			const filterProps = arr => {
				const propsToRemove = new Set([
					'id',
					'parentType',
					'parentName',
					'parentId',
				]);

				return arr.map(item => {
					const o = {};

					for (const prop in item) {
						if (!propsToRemove.has(prop)) {
							o[prop] = item[prop];
						}
					}

					return o;
				});
			};

			const operationsRecordList = filterProps(
				productionModel.get('operationsRecordList') || [],
			);

			const billOfMaterialsRecordList = filterProps(
				productionModel.get('billOfMaterialsRecordList') || [],
			);

			this.model.set({
				operationsRecordList,
				billOfMaterialsRecordList,
			});

			Espo.Ui.notify(false);
		}
	};
});
