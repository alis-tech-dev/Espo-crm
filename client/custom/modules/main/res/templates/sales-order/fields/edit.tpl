<div class="entry-container">
	{{#each entries}}
		<div class="entry" data-key="{{key}}">
			{{{var key ../this}}}
		</div>
	{{/each}}
	<div class='no-data' {{#unless empty}}style='display:none'{{/unless}}>{{translate 'No Data'}}</div>
</div>
{{#if editMode}}
	<div class="button-container">
		<div class="btn-group">
			<button
				class="btn btn-default radius-right"
				data-action="addEntry"
				title="Přidat zadání"
			><span class="fas fa-plus"></span> Přidat zadání
			</button>
		</div>
	</div>
{{/if}}
