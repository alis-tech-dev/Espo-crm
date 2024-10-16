<div class="form-group">
    <a href="javascript:" class="remove-filter pull-right" data-name="{{name}}">{{#unless notRemovable}}<i class="fas fa-times"></i>{{/unless}}</a>
    <label class="control-label small" data-name="{{name}}">{{translate name category='fields' scope=scope}}</label>
    <div class="field" data-name="{{name}}">{{{field}}}</div>
    <div class="isCustom"><input type="checkbox" class="isCustomCheck" {{#if isCustom}}checked{{/if}}> <input type="text" class="isCustomText" value="{{customValue}}"></div>
</div>