define(['views/record/list-tree-item'], Dep => {
	return class extends Dep {
		template = 'production:production-order/list-tree-item';

		listViewName = 'production:views/production-order/production-tree';
		isUnfolded = true;

		data() {
			return {
				...Dep.prototype.data.call(this),
				attributes: this.model.attributes,
				readOnly: true,
			};
		}

		unfold() {
			let childCollection = this.model.get('childCollection') || null;

			if (childCollection !== null) {
				this.createChildren();
				this.isUnfolded = true;
				this.afterUnfold();

				this.trigger('after:unfold');

				return;
			}

			this.getCollectionFactory().create(this.scope, collection => {
				collection.url =
					'ProductionOrder/action/childrenOf?id=' +
					this.model.get('productId');
				collection.parentId = this.model.id;
				collection.maxDepth = null;

				Espo.Ui.notify(' ... ');

				this.listenToOnce(collection, 'sync', () => {
					Espo.Ui.notify(false);

					this.model.set('childCollection', collection);

					this.createChildren();

					this.isUnfolded = true;

					if (collection.length || !this.createDisabled) {
						this.afterUnfold();

						this.trigger('after:unfold');
					} else {
						this.isEnd = true;

						this.afterIsEnd();
					}
				});

				collection.fetch();
			});
		}
	};
});
