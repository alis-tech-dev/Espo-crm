<span title='{{value}}'>{{value}}</span>
{{#if isNotEmpty}}
    {{#if style}}
        <span
            class="{{class}}-{{style}}"
            title="{{statusTranslated}}"
        >
    {{/if}}
        {{statusTranslated}}
    {{#if style}}
        </span>
    {{/if}}
{{/if}}
