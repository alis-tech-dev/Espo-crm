<textarea
	class='form-control auto-height'
	data-name='{{name}}Street'
	rows='1'
	placeholder='{{translate "Street"}}'
	autocomplete='espo-street'
	maxlength='{{streetMaxLength}}'
	style='resize: none;'
>{{streetValue}}</textarea>
<div class='row'>
	<div class='col-sm-4 col-xs-4'>
		<input
			type='text'
			class='form-control'
			data-name='{{name}}City'
			value='{{cityValue}}'
			placeholder='{{translate "City"}}'
			autocomplete='espo-city'
			maxlength='{{cityMaxLength}}'
		/>
	</div>
	<div class='col-sm-4 col-xs-4'>
		<input
			type='text'
			class='form-control'
			data-name='{{name}}State'
			value='{{stateValue}}'
			placeholder='{{translate "State"}}'
			autocomplete='espo-state'
			maxlength='{{stateMaxLength}}'
		/>
	</div>
	<div class='col-sm-4 col-xs-4'>
		<input
			type='text'
			class='form-control'
			data-name='{{name}}PostalCode'
			value='{{postalCodeValue}}'
			placeholder='{{translate "PostalCode"}}'
			autocomplete='espo-postalCode'
			maxlength='{{postalCodeMaxLength}}'
			spellcheck='false'
		/>
	</div>
</div>
{{#if countryAsEnum}}
	<select data-name='{{name}}Country' class='form-control main-element'>
		{{options
			countryOptions
			countryValue
			scope=scope
			field=name
			translatedOptions=countryTranslatedOptions
			includeMissingOption=true
			styleMap=countryStyleMap
		}}
	</select>
{{else}}
	<input
		type='text'
		class='form-control'
		data-name='{{name}}Country'
		value='{{countryValue}}'
		placeholder='{{translate "Country"}}'
		autocomplete='espo-country'
		maxlength='{{countryMaxLength}}'
	/>
{{/if}}