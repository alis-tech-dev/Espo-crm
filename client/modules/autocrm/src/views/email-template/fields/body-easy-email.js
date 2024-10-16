/* global EasyEmailEditor:readonly */

define(['views/fields/text', 'views/fields/wysiwyg', 'lib!easy-email'], (Dep, Wysiwyg) => {
	return Dep.extend({
		detailTemplate: 'autocrm:email-template/fields/body-easy-email/detail',

		editTemplate: 'autocrm:email-template/fields/body-easy-email/edit',

		useIframe: true, // for wysiwyg

		editorHeight: '800px',

		getAttributeList: function () {
			return ['body', 'bodyMjml'];
		},

		setup: function () {
			Dep.prototype.setup.call(this);

			this.listenToInsertField();
		},

		listenToInsertField: function () {
			this.listenTo(this.model, 'insert-field', data => {
				if (!this.editor) {
					return;
				}

				const tag = '{' + data.entityType + '.' + data.field + '}';
				const content = this.editor.getContent();

				content.children.unshift({
					type: 'advanced_text',
					data: { value: { content: tag } },
					attributes: {},
					children: [],
				});

				this.editor.setContent(content);
			});
		},

		afterRender: function () {
			Dep.prototype.afterRender.call(this);

			if (this.isEditMode() && this.model.get('type') === 'EasyEmail') {
				this.$editor = this.$el.find('.easy-email-editor');
				this.enableEasyEmailEditor();
			}

			if (this.isReadMode()) {
				this.renderDetail();
			}
		},

		onRemove: function () {
			if (this.editor) {
				this.editor.unmount();
			}
		},

		getLocale: function () {
			return this.getConfig().get('language').substring(0, 2);
		},

		getTranslations: function () {
			const data = this.getLanguage().data;

			if (!('EmailTemplate' in data)) {
				return {};
			}

			return data.EmailTemplate.easyEmailEditorLabels || {};
		},

		enableEasyEmailEditor: function () {
			this.editor = EasyEmailEditor.render(this.$editor[0], {
				height: this.editorHeight,
				mjmlContent: this.model.get('bodyMjml') || '',
				locale: this.getLocale(),
				translations: this.getTranslations(),
				onChange: () => {
					// onChange might be triggered right after save (maybe because of editor destruction?), which cannot trigger change event
					// as it would fetch discarded edits back to model
					if (this.isRendered() && this.isEditMode()) {
						this.trigger('change');
					}
				},
				onUploadImage: this.uploadInlineAttachment.bind(this),
			});
		},

		uploadInlineAttachment: function (file) {
			const orgName = this.name;
			this.name = 'body';
			return Wysiwyg.prototype.uploadInlineAttachment.call(this, file).then(attachment => {
				this.name = orgName;
				return '?entryPoint=attachment&id=' + attachment.id;
			});
		},

		isPlain: function () {
			return Wysiwyg.prototype.isPlain.call(this);
		},

		renderDetail: function () {
			const orgName = this.name;
			this.name = 'body';
			Wysiwyg.prototype.renderDetail.call(this);
			this.name = orgName;
		},

		getValueForDisplay: function () {
			return this.model.get('body');
		},

		sanitizeHtml: function (html) {
			return Wysiwyg.prototype.sanitizeHtml.call(this, html);
		},

		htmlHasColors: function (html) {
			return Wysiwyg.prototype.htmlHasColors.call(this, html);
		},

		fetch: function () {
			const data = {};

			if (this.editor) {
				data.body = this.sanitizeHtml(this.editor.getHtml());
				data.bodyMjml = this.editor.getMjml();
			}

			return data;
		},
	});
});
