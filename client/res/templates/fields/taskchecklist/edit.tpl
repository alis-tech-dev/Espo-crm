
{{#each optionDataList}}
<div class="checklist-item-container">
<a href="javascript:" class="pull-right" data-id="{{id}}" data-action="clearLink"><span class="fas fa-times"></a>
    <input type="checkbox" data-name="{{dataName}}" data-id="{{id}}" {{#if isChecked}} checked{{/if}}>
    <label for="{{id}}" class="checklist-label">{{label}}</label>
</div>
{{/each}}
<button data-action="selectLink" class="btn btn-default" type="button" tabindex="-1"><span class="fas fa-plus"></span></button>
{{#unless optionDataList.length}}{{translate 'None'}}{{/unless}}
