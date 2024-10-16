{{#if disabled}}
    <div>
        <p class="h3">{{translate 'mattermostDisabled' category='messages'}}</p>
    </div>
{{else}}
    <div class="mattermost-iframe">
        <iframe src="{{server}}"></iframe>
    </div>
{{/if}}
