<div class="entry-container">
    {{#each entries}}
    <div style="border: 3px solid grey; padding: 20px; border-radius: 10px; margin-top: 30px;">
        <button class="btn btn-danger btn-delete" data-action="deleteEntry" data-key="{{key}}" title="Delete">
            <span class="fas fa-trash"></span>
        </button>

        <div class="entry" data-key="{{key}}">
            {{{var key ../this}}}
        </div>
    </div>
    {{/each}}
    <div class='no-data' {{#unless empty}}style='display:none'{{/unless}}>{{translate 'No Data'}}</div>
</div>
<div class="button-container" style="margin-top: 20px;">
    <div class="btn-group">
        <button
                class="btn btn-default radius-right"
                data-action="addEntry"
                title="Přidat zadání"
        ><span class="fas fa-plus"></span> Přidat zadání
        </button>
    </div>
</div>
