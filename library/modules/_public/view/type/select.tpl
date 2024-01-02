{#if $item.nolabel!='on'#}
    {#if $item.required=='on'#}*{#/if#}
    <label for="{#$item.name#}">{#$item.label#}</label>
{#/if#}
<select name="fields{#$_subject#}[{#$item.name#}]" {#if $item.disabled#}disabled{#/if#} class="form-control select2 {#$item.class#}" style="width: 100%;">
    <option value="">請選擇</option>
    {#foreach $item.options as $optionkey=>$optionitem#}
        <option value="{#$optionkey#}" {#if $item.value==$optionkey#}selected{#/if#}>{#$optionitem#}</option>
    {#/foreach#}
</select>