<div class='main-element'>
	{{#if amountOfDays}}
		<label>Každých
			{{amountOfDays}}
			{{#if isDayChecked}}dní{{/if}}{{#if
				isMonthChecked
			}}měsíců{{/if}}{{#if isYearChecked}}let{{/if}}</label>
	{{else}}
		<label>Nenastaveno</label>
	{{/if}}
</div>