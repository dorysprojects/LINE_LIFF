{#if $item.nolabel!='on'#}
    {#if $item.required=='on'#}*{#/if#}
    <label for="{#$item.name#}">{#$item.label#}</label><br>
{#/if#}
<input name="fields{#$_subject#}[{#$item.name#}]" type="hidden" value="{#$item.value#}">
{#foreach $item.options as $optionkey=>$optionitem#}
    <input name="{#$_subject#}{#$item.name#}" type="checkbox" class="minimal {#$item.class#}" value="{#$optionkey#}" {#if in_array($optionkey, $item.optionVal)#}checked{#/if#} {#if $item.disabled#}disabled{#/if#}>{#$optionitem#}
{#/foreach#}
<script>
    var changeCtn = 0;
    $(function(){
        $(document).on('change', 'input[name="{#$_subject#}{#$item.name#}"]', function(event) {
            var {#if $_subject#}_subject{#/if#}{#$item.name#}_Array = [];
            $('input[name="{#$_subject#}{#$item.name#}"]:checked').each(function(e) {
                {#if $_subject#}_subject{#/if#}{#$item.name#}_Array.push($(this).val());
            });
            var {#if $_subject#}_subject{#/if#}{#$item.name#}_Text = {#if $_subject#}_subject{#/if#}{#$item.name#}_Array.join('+');
            $('input[name="fields{#$_subject#}[{#$item.name#}]"]').val({#if $_subject#}_subject{#/if#}{#$item.name#}_Text);
            
            if($('.card-button')[0]){
                $('#BtnEmoticonReal').hide();
                $('.card-button .line').hide();
                $('.card-button .facebook').hide();
                var {#if $_subject#}_subject{#/if#}{#$item.name#}_Class = '';
                switch({#if $_subject#}_subject{#/if#}{#$item.name#}_Text){
                    default:
                    case 'line+facebook':
                        $('.TemplateContainer').removeClass('FB');
                        {#if $_subject#}_subject{#/if#}{#$item.name#}_Class = '.line.facebook';
                        break;
                    case 'facebook':
                        $('.TemplateContainer').addClass('FB');
                        {#if $_subject#}_subject{#/if#}{#$item.name#}_Class = '.facebook';
                        break;
                    case 'line':
                        $('.TemplateContainer').removeClass('FB');
                        {#if $_subject#}_subject{#/if#}{#$item.name#}_Class = '.line';
                        $('#BtnEmoticonReal').show();
                        break;
                }
                $('.card-button ' + {#if $_subject#}_subject{#/if#}{#$item.name#}_Class).show();

                $('.card-button').each(function(e) {
                    var option = $(this).find('select.form-control option:selected');
                    option.each(function(e) {
                        if($(this).css('display')==='none'){
                            option.parents('select').val('').change();
                        }else{
                            switch(option.parents('select').val()){
                                case 'text':
                                    if(changeCtn>0){
                                        option.parents('select').val('').change();
                                    }
                                    break;
                            }
                        }
                    });
                });
                //QuickReply
                if($('#BtnGrp5')[0]){
                    $('#BtnGrp5').parents('.Template').find('.TemplateBtn>span.label-danger').click();
                }
            }
            changeCtn++;
        });
        $('input[name="{#$_subject#}{#$item.name#}"]').eq(0).change();
    });
</script>