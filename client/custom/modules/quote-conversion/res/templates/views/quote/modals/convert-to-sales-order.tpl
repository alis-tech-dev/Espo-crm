<div class="quote-conversion-modal">
	{{#each entries}}
		<div class="cell entry form-group">
			<div class="checklist-item-container">
				<input
					type="checkbox"
					data-entry="{{index}}"
					class="form-checkbox entry-checkbox"
					id="{{id}}"
				>
				<label for="{{id}}" class="checklist-label entry-label">{{description}}</label>
			</div>
			<div class="entry-items">
				{{#each items}}
					<div class="checklist-item-container">
						<input
							type="checkbox"
							data-belongs-to="{{../index}}"
							id="{{id}}"
							class="form-checkbox entry-item-checkbox"
							{{#if processed}}disabled{{/if}}
						>
						<label for="{{id}}" class="checklist-label">{{name}}</label>
					</div>
				{{/each}}
			</div>
		</div>
	{{/each}}
</div>
