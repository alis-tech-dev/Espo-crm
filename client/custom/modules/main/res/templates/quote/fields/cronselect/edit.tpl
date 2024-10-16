<div class="main-element">
<label>Každých</label>
    <input type="text" id="dateNumber" {{#if amountOfDays}}value="{{amountOfDays}}"{{/if}}>
    <select name="typeOfDate" id="typeOfDate">
        <option value="D" {{#if isDayChecked}} selected="selected"{{/if}}>dní</option>
        <option value="M" {{#if isMonthChecked}} selected="selected"{{/if}}>měsíců</option>
        <option value="Y" {{#if isYearChecked}} selected="selected"{{/if}}>let</option>
    </select>
</div>
