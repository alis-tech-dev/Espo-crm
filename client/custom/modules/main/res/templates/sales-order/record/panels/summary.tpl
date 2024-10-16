<div>
    <a
        role="button"
        tabindex="0"
        class="action{{#unless showFold}} hidden{{/unless}} small"
        data-action="fold"
        data-id="{{model.id}}"><span class="fas fa-chevron-down"></span>
    </a>
    <a
        role="button"
        tabindex="0"
        class="action{{#unless showUnfold}} hidden{{/unless}} small"
        data-action="unfold"
        data-id="{{model.id}}"><span class="fas fa-chevron-right"></span>
    </a>
</div>

{{#each orderIds}}
    <div data-id="{{id}}" class="tree-row">
    {{var this ../this}}
    </div>
{{/each}}