{#if $tips#}
    <div id="tips" class="tips">
        {#$Html_nail#}
        <span>小提示:</span>
        <div id="tips_area" class="tips_area">
            {#foreach $tips as $key=>$item#}
                <div id="tips_{#$key+1#}" class="change_tips">{#$item#}</div>
            {#/foreach#}
        </div>
        {#$Html_arrow#}
    </div>
{#/if#}