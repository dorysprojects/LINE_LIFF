<!DOCTYPE html>
<html>
    <head>
        <title>{#$ModuleNameList.$_Module#} - {#$ActionNameList.$_ActionName#}</title>
        {#include file=$__PublicView|cat:'backend_head.tpl'#}
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            {#include file=$__PublicView|cat:'backend_top.tpl'#}
            {#include file=$__PublicView|cat:'backend_menu.tpl'#}
            <div class="content-wrapper">
                {#include file=$__PublicView|cat:'alertArea.tpl'#}
                <section class="content">
                    <form id="DataForm" action="#" onsubmit="return false;">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                </h3>
                                <input type="button" class="btn btn-default {#if $noreturn#}hide{#/if#}" name="cancel" value="返回列表">
                                <div class="box-tools pull-right">
                                    <button id="SubmitDataForm" type="submit" class="btn btn-success btn- {#if $nosave#}hide{#/if#}"><span class="fa fa-save"></span></button>
                                    <button type="button" class="btn btn-box-tool {#if $nocollapse#}hide{#/if#}" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool {#if $remove#}hide{#/if#}" data-widget="remove"><i class="fa fa-remove"></i></button>
                                    <div id="Export" type="button" class="btn btn-info {#if !$export#}hide{#/if#}"><i class="fa fa-cloud-download"></i> 匯出</div>
                                </div>
                            </div>
                            <div class="box-body {#if $nobody#}hide{#/if#}">
                                <div class="table-responsive">
                                    {#foreach $columns as $key=>$item#}
                                        <div class="form-group">
                                            {#if in_array($item.name, $SqlColumnList)#}
                                                {#assign var="_subject" value=""#}
                                            {#else#}
                                                {#assign var="_subject" value="[subject]"#}
                                            {#/if#}
                                            {#include file=$__PublicView|cat:'type/'|cat:$item.type|cat:'.tpl'#}
                                        </div>
                                    {#/foreach#}
                                    {#if $FormType#}
                                        <div class="form-group">
                                            {#include file=$__PublicView|cat:'type/'|cat:$FormType|cat:'.tpl'#}
                                        </div>
                                    {#/if#}
                                </div>
                            </div>
                            <div class="box-footer hide">

                            </div>
                        </div>
                        {#if $RowType#}
                            {#include file=$__PublicView|cat:'type/'|cat:$RowType|cat:'.tpl'#}
                        {#/if#}
                    </form>
                </section>
            </div>
            {#include file=$__PublicView|cat:'backend_footer.tpl'#}
            {#$js#}
            {#$xajax_js#}
        </div>
    </body>
</html>