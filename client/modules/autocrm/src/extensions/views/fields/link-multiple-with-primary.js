extend(Dep => {
	return class extends Dep {
		getValueForDisplay() {
			if (this.isDetailMode() || this.isListMode()) {
				let itemList = [];

				if (this.primaryId) {
					itemList.push(
						this.getDetailPrimaryLinkHtml(
							this.primaryId,
							this.primaryName,
						),
					);
				}

				if (!this.ids.length) {
					return;
				}

				this.ids.forEach(id => {
					if (id !== this.primaryId) {
						itemList.push(this.getDetailLinkHtml(id));
					}
				});

				return itemList
					.map(item => $('<div>').append(item).get(0).outerHTML)
					.join('');
			}
		}

		getDetailPrimaryLinkHtml(id, name) {
			// Do not use the `html` method to avoid XSS.

			name = name || this.nameHash[id] || id;

			if (!name && id) {
				name = this.translate(this.foreignScope, 'scopeNames');
			}

			const iconHtml = this.isDetailMode() ? this.getIconHtml(id) : '';

			const $a = $('<a>')
				.attr('href', this.getUrl(id))
				.attr('data-id', id)
				.append($('<strong>').text(name));

			if (iconHtml) {
				$a.prepend(iconHtml);
			}

			return $a.get(0).outerHTML;
		}
	};
});
