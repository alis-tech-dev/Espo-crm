
<div>
    {{#each phoneNumberData}}
    <div class="input-group phone-number-block">
        <span class="input-group-btn">
        <input type="input" class="form-control key no-margin-shifting" value="{{key}}">
        </span>
        <span class="input-group-btn">
        <input type ="input" class="form-control value no-margin-shifting" value="{{value}}">
        </span>
        <span class="input-group-btn">

            <button class="btn btn-link btn-icon" type="button" tabindex="-1" data-action="removePhoneNumber" data-property-type="invalid" data-toggle="tooltip" data-placement="top" title="Remove" style="
    float: right;
">
                <span class="fas fa-times"></span>
            </button>


        </span>
    </div>
    {{/each}}
</div>

<button class="btn btn-default btn-icon" type="button" data-action="addPhoneNumber"><span class="fa fa-plus"></span></button>
