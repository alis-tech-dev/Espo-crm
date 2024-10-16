{{#if recordListEnabled}}
	{{#ifEqual recordListButtonsPosition 'Top'}}
		{{#unless recordListCreateDisabled}}
			<button class="btn btn-default btn-icon" data-action="addItem" title="{{translate 'Add Item'}}">
				<span class="{{#if plusIconClass}}{{plusIconClass}}{{else}}fas fa-plus{{/if}}"></span>
			</button>
		{{/unless}}
		{{#unless recordListLinkDisabled}}
			<button class="btn btn-default btn-icon" data-action="linkItems" title="{{translate 'Link Items'}}">
				<span class="{{#if linkIconClass}}{{linkIconClass}}{{else}}fas fa-link{{/if}}"></span>
			</button>
		{{/unless}}
	{{/ifEqual}}

	<div class="recordList main-element">{{{list}}}</div>

	{{#ifEqual recordListButtonsPosition 'Bottom'}}
		{{#unless recordListCreateDisabled}}
			<button class="btn btn-default btn-icon" data-action="addItem" title="{{translate 'Add Item'}}">
				<span class="{{#if plusIconClass}}{{plusIconClass}}{{else}}fas fa-plus{{/if}}"></span>
			</button>
		{{/unless}}
		{{#unless recordListLinkDisabled}}
			<button class="btn btn-default btn-icon" data-action="linkItems" title="{{translate 'Link Items'}}">
				<span class="{{#if linkIconClass}}{{linkIconClass}}{{else}}fas fa-link{{/if}}"></span>
			</button>
		{{/unless}}
	{{/ifEqual}}
{{else}}
	<div class="link-container list-group"></div>

	<div class="input-group add-team">
		<input
			class="main-element form-control"
			type="text"
			value=""
			autocomplete="espo-{{name}}"
			placeholder="{{translate 'Select'}}"
			spellcheck="false"
		>
		<span class="input-group-btn">
        <button
			data-action="selectLink"
			class="btn btn-default btn-icon"
			type="button"
			tabindex="-1"
			title="{{translate 'Select'}}"
		><span class="fas fa-angle-up"></span></button>
    </span>
	</div>

{{/if}}
