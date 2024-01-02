{#if $item.nolabel!='on'#}
    {#if $item.required=='on'#}*{#/if#}
    <label for="{#$item.name#}">{#$item.label#}</label><br>
{#/if#}
<span>{#$item.value#}</span>