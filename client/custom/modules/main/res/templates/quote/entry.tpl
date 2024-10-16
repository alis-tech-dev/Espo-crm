<div class='cell cell-name'>
	<label class='field-label'>Name</label>
	<div class='field field-name'>{{{name}}}</div>
</div>
<div class='cell cell-description'>
	<label class='field-label'>Requirements</label>
	<div class='field field-description'>{{{description}}}</div>
</div>
<div class='cell cell-solution'>
	<label class='field-label'>Solution</label>
	<div class='field field-solution'>{{{solution}}}</div>
</div>
<div class='cell cell-files'>
	<div class='field field-files'>{{{files}}}</div>
</div>
<div class='cell cell-recordList'>
	<div class='field field-recordList'>{{{items}}}</div>
</div>
<hr>
{{#if grandTotalAmount}}
    <div class='cell cell-grandTotalAmount'>
	<div class='field field-grandTotalAmount' style='font-size: 11pt; text-align: right; colspan="2";'>
	    <span style='padding: 3mm;'>Grand total amount: {{{grandTotalAmount}}} EUR</span>
	</div>
    </div>
{{/if}}
{{#if totalDiscount}}
    <div class='cell cell-totalDiscount'>
	<div class='field field-totalDiscount' style='font-size: 11pt; text-align: right; colspan="2";'>
	    <span style='padding: 3mm;'>Total discount: {{{totalDiscount}}} EUR</span>
	</div>
    </div>
{{/if}}
<br>
{{#if totalAmount}}
    <div class='cell cell-totalAmount'>
	<div class='field field-totalAmount' style='font-size: 13pt; text-align: right; colspan="2"; font-weight: bold;'>
	    <span style='background-color:#ddd; padding: 3mm; border-radius: 5px;'>Total amount: {{{totalAmount}}} EUR</span>
	</div>
    </div>
{{/if}}

