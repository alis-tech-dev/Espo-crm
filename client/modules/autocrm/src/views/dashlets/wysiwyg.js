define(['views/dashlets/memo'], Dep => {
	return class extends Dep {
		name = 'Wysiwyg';

		templateContent = `
        {{#if body}}
            <div class="complex-text complex-text-memo">{{{body}}}</div>
        {{/if}}
    `;

		data() {
			return {
				body: this.getOption('body'),
			};
		}
	};
});
