{{#unless isEmpty}}{{{value}}}{{else}}
	{{#if valueIsSet}}<span class="none-value">{{translate 'None'}}</span>{{else}}
		<span class="loading-value">...</span>{{/if}}
{{/unless}}
