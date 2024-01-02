{#if $item.nolabel!='on'#}
    {#if $item.required=='on'#}*{#/if#}
    <label for="{#$item.name#}">{#$item.label#}</label>
{#/if#}
<input  id="{#$item.name#}" name="fields{#$_subject#}[{#$item.name#}]" type="{#$item.type#}" value="{#$item.value#}" class="form-control" placeholder="請輸入{#$item.label#}" {#if $item.required=='on'#}required{#/if#}  onmouseout="$(this).attr('type', 'password');" onclick="if($(this).attr('type') === 'text'){ $(this).attr('type', 'password'); } else { $(this).attr('type', 'text'); }">