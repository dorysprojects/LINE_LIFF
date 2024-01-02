<div id="datepicker" style="{#$item.style#}">
    {#if $item.nolabel!='on'#}
        {#if $item.required=='on'#}*{#/if#}
        <label for="{#$item.name#}">{#$item.label#}</label>
    {#/if#}
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="{#$item.id#}" {#if $item.required=='on'#}required{#/if#} {#if $item.disabled#}disabled{#/if#} name="fields{#$_subject#}[{#$item.name#}]" type="{#$item.type#}" min="{#$item.min#}" max="{#$item.max#}" value="{#$item.value#}" style="width: 150px;" class="form-control {#$item.class#}" placeholder="請輸入{#$item.label#}">
    </div>
</div>
