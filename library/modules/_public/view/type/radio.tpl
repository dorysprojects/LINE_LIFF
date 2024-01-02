{#if $item.nolabel!='on'#}
    {#if $item.required=='on'#}*{#/if#}
    <label for="{#$item.name#}">{#$item.label#}</label><br>
{#/if#}
{#foreach $item.options as $optionkey=>$optionitem#}
    <input name="fields{#$_subject#}[{#$item.name#}]" type="radio" class="minimal {#$item.class#}" value="{#$optionkey#}" {#if $item.value==$optionkey#}checked{#/if#} {#if $item.disabled#}disabled{#/if#}>{#$optionitem#}
{#/foreach#}
{#if $item.onchange=='on'#}
    <script>
        $(document).on('change', 'input[name="fields{#$_subject#}[{#$item.name#}]"]', function(event) {
            if($('input[name="fields{#$_subject#}[{#$item.name#}]"]:checked').val() === 'date'){
                $('#datepicker').show();
                $('#timepicker').show();
            }else{
                $('#datepicker').hide();
                $('#timepicker').hide();
            }
        });
    </script>
{#/if#}