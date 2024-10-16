<div class="stock-info-container">
    {{#each warehouseList}}
        <a href="{{url}}"><h3>{{name}}</h3></a>
        <div data-warehouse-id="{{id}}">{{{var key ../this}}}</div>
    {{/each}}
</div>
{{#if empty}}
    {{translate 'No Data'}}
{{/if}}
