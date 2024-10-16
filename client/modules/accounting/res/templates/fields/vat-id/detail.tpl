{{#if isNotEmpty~}}
	{{~#if copyToClipboard~}}
		<a
			role='button'
			data-action='copyToClipboard'
			class='pull-right text-soft'
			title='{{translate "Copy to Clipboard"}}'
		><span class='far fa-copy'></span></a>
	{{~/if~}}
	{{value}}
{{~else}}
	{{#if valueIsSet}}<span class='none-value'>{{translate
				'None'
			}}</span>{{else}}
		<span class='loading-value'>...</span>{{/if}}
{{/if}}

{{#if isNotEmpty}}
    {{#if style}}
        <div class="vat-id-box">
            <span class="{{class}}-{{style}}" style="display: inline-block; margin-top: 6px;">
    {{/if}}
            {{statusTranslated}}<span class="fas fa-info-circle" style="margin-left: 6px"></span>
            <div class="vat-id-info-box">{{{descriptionTranslated}}}</div>
    {{#if style}}
            </span>
        </div>
    {{/if}}
    {{else}}
        {{#if valueIsSet}}
            <span class="none-value">{{translate 'None'}}</span>
        {{else}}
            <span class="loading-value">...</span>
        
    {{/if}}
{{/if}}