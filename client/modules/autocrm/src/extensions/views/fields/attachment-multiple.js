extend(
	Dep =>
		class extends Dep {
			afterRender() {
				super.afterRender();

				if (
					this.isDetailMode() &&
					(this.model.get(this.name + 'Ids') || []).length > 0 &&
					(this.params.copyAttachmentsButton ?? false)
				) {
					const $button = $('<button>', {
						type: 'button',
						class: 'btn btn-default',
						'data-name': 'copyAttachments',
						'data-action': 'copyAttachments',
					}).append(
						$('<span>', { class: 'fas fa-copy fa-sm' }),
						$('<span>').text(this.translate('Copy Attachments', 'labels', 'Global')),
					);

					$button.on('click', () => {
						this.copyAttachments();
					});

					this.$el.append($button);
				}
			}

			copyAttachments() {
				let entityList = this.params.copyAttachmentsEntityList || [];

				if (entityList.length === 0) {
					entityList = this.getEntitiesWithAttachmentMultiple();
				}

				this.createView(
					'dialog',
					'autocrm:views/modals/copy-attachments',
					{
						entityList,
					},
					view => {
						view.render();
						this.listenToOnce(view, 'done', this.handleCopyAttachmentsDone.bind(this));
					},
				);
			}

			handleCopyAttachmentsDone(model) {
				const createNew = model.get('createNew');
				const parentId = createNew ? null : model.get('entityId');
				const parentType = model.get('entityType');
				const attachmentField = model.get('attachmentField');

				this.ajaxPostRequest('Attachment/action/copy', {
					ids: this.model.get(this.name + 'Ids'),
					parentId,
					parentType,
					attachmentField: attachmentField || this.name,
				})
					.then(response => {
						const router = this.getRouter();

						if (createNew) {
							const returnUrl = router.getCurrentUrl();

							router.navigate(`#${parentType}/create`, { trigger: false });
							router.dispatch(parentType, 'create', {
								attributes: response,
								returnUrl,
							});
						} else {
							router.navigate(`#${parentType}/view/${parentId}`, { trigger: false });
							router.dispatch(parentType, 'view', { id: parentId });
						}
					})
					.catch(error => {
						console.error('Error copying attachments:', error);
					});
			}

			getEntitiesWithAttachmentMultiple() {
				const entityDefs = this.getMetadata().get('entityDefs') || {};

				return (
					Object.entries(entityDefs)
						.filter(
							([_, entityDef]) =>
								!entityDef.disableAttachments &&
								Object.values(entityDef.fields || {}).some(
									field => field.type === 'attachmentMultiple',
								),
						)
						.map(([entityType]) => entityType) || []
				);
			}
		},
);
