{{#if order.materials}}
<div style="width: 100%; margin-left: {{level}}0px; font-family: Arial, sans-serif;">
    <div style="display: flex; justify-content: space-between; padding: 10px; background-color: #f2f2f2; border-bottom: 2px solid #ddd;">
        <div style="flex: 2;"><strong>Produkt</strong></div>
        <div style="width: 150px; text-align: center;"><strong>Potřebné množství</strong></div>
        <div style="width: 200px; text-align: center;"><strong>Rezervované množství</strong></div>
        <div style="width: 150px; text-align: center;"><strong>Na skladě</strong></div>
        <div style="width: 150px; text-align: center;"><strong>Objednáno</strong></div>
        <div style="width: 150px; text-align: center;"><strong>Ve výrobě</strong></div>
        <div style="width: 150px; text-align: center;"><strong>Objednáno</strong></div>
    </div>
    <div>
        {{#each order.materials}}
            <div style="display: flex; justify-content: space-between; padding: 10px; border-bottom: 1px solid #eee;">
                <div style="flex: 2;"><a href="#Product/view/{{id}}">{{name}}</a></div>
                <div style="width: 150px; text-align: center;">{{neededQuantity}}</div>
                <div style="width: 200px; text-align: center;">{{reservedQuantity}}</div>
                <div style="width: 150px; text-align: center;">{{warehouseQuantity}}</div>
                <div style="width: 150px; text-align: center;">{{orderedQuantity}}</div>
                <div style="width: 150px; text-align: center;">{{inProductionQuantity}}</div>
                <div style="width: 150px; text-align: center;">
                    <button class="btn btn-default {{#ifEqual orderedQuantity 0}}btn-danger{{else}}btn-success{{/ifEqual}}" data-action="order" data-id="{{id}}">Objednat</button>
                </div>
            </div>
        {{#if productionOrder}}
            <div style="padding-left: 20px;">
                <div style="border-left: 2px solid #ccc; padding-left: 10px;">
                    <div data-id="{{productionOrder.id}}" class="tree-row" style="padding: 10px;">
                        {{{var productionOrder.id ../this}}}
                    </div>
                </div>
            </div>
        {{/if}}
        {{/each}}
    </div>
</div>
{{/if}}