{#if $item.nolabel!='on'#}
    {#if $item.required=='on'#}*{#/if#}
    <label for="{#$item.name#}">{#$item.label#}</label>
{#/if#}
<input {#if $item.required=='on'#}required{#/if#} {#if $item.disabled#}disabled{#/if#} id="{#$item.name#}" name="fields{#$_subject#}[{#$item.name#}]" type="{#$item.type#}" value="{#$item.value#}" class="form-control {#$item.class#}" placeholder="請輸入{#$item.label#}">