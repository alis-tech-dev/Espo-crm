
{{#each optionDataList}}
<div class="checklist-item-container">

    <input type="checkbox" data-name="{{dataName}}" id="{{id}}" {{#if isChecked}} checked{{/if}} disabled="disabled">
    <label for="{{id}}" class="checklist-label"><a href="{{link}}">{{label}}</a></label>

</div>
{{/each}}
{{#unless optionDataList.length}}{{translate 'None'}}{{/unless}}
