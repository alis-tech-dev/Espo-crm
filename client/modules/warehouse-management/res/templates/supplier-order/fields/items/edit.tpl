{{#if recordListEnabled}}
	<div class="recordList main-element">{{{list}}}</div>

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
		<button class="btn btn-default btn-icon" data-action="hintProducts" title="{{translate 'Hint Products' scope='SupplierOrder'}}">
			<span class="fas fa-question"></span>
		</button>
	<div class="link-container list-group"></div>
{{/if}}
