<div class="entry-container ">
    {{#each entries}}
    <div style="border: 3px solid grey; padding: 20px; border-radius: 10px; margin-top: 30px;">
        <div class="entry" data-key="{{key}}">
            {{{var key ../this}}}
        </div>
    </div>
    {{/each}}
    <div class='no-data' {{#unless empty}}style='display:none'{{/unless}}>{{translate 'No Data'}}</div>
</div>