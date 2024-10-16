<div class="list-group no-side-margin">
	{{#each types}}
		<div class="list-group-item">

			<h4 class="list-group-item-heading">
				{{translate this category="labels" scope="Template"}}
			</h4>

			<p>
				{{translate this category="messages" scope="Template"}}
			</p>

			<button
				class="btn btn-primary action"
				data-action="create"
				data-type="{{this}}"
			>
				{{translate "Create"}}
			</button>
		</div>
	{{/each}}
</div>