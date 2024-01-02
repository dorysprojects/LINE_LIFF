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
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        {#if $BoxTitle#}
                                            {#$BoxTitle#}
                                            <br><br>
                                        {#/if#}
                                        {#$LeftCustomBtn#}
                                    </h3>
                                    <div class="box-tools pull-right">
                                        {#$TopCustomEdit#}
                                        <a class="btn btn-info btn-sm {#if $noadd#}hide{#/if#}" href="/be/{#$_Module#}/add{#if $__TYPE#}/type/{#$__TYPE#}{#/if#}">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a class="btn btn-success btn-sm {#if $nosave#}hide{#/if#}" onclick="ListPageSaveButton();">
                                            <i class="fa fa-save"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm {#if $nodelete#}hide{#/if#}" onclick="template_btn_deleteall();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        {#if $collapse#}
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        {#/if#}
                                        {#if $remove#} 
                                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        {#/if#}
                                        <div id="Export" type="button" class="btn btn-info {#if !$export#}hide{#/if#}"><i class="fa fa-cloud-download"></i> 匯出</div>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <form id="template_form">
                                        <div class="col-xs-12">
                                            {#foreach $system as $key=>$item#}
                                                <div class="col-xs-3">
                                                    <label for="subject">{#$item.text#}</label>
                                                    {#if $item.type=='text'#}
                                                        <input name="fields[1][{#$key#}]" type="text" value="{#$item.value#}" class="form-control" style="display:inline-block;width:auto;" placeholder="請輸入{#$item.text#}">
                                                    {#else if $item.type=='view'#}
                                                        {#$item.value#}
                                                    {#/if#}
                                                </div>
                                            {#/foreach#}
                                        </div>
                                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th {#if $noselect#}class="hide"{#/if#}><input class="checkbox template_clickbox_clickall" type="checkbox"></th>
                                                    {#foreach $columns as $key=>$item#}
                                                        <th>{#$item#}</th>
                                                    {#/foreach#}
                                                    <th {#if $noedit#}class="hide"{#/if#}>管理</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {#foreach $rows as $rowkey=>$rowitem#}
                                                    <tr>
                                                        <td {#if $noselect#}class="hide"{#/if#}><input name="select[{#$rowitem.id#}]" class="template_clickbox_item" type="checkbox"/></td>
                                                        {#foreach $columns as $columnkey=>$columnsitem#}
                                                            <th>
                                                                {#if $columnsType && $columnsType.$columnkey!='view'#}
                                                                    {#if in_array($columnkey, $SqlColumnList)#}
                                                                        {#assign var="_subject" value=""#}
                                                                    {#else#}
                                                                        {#assign var="_subject" value="[subject]"#}
                                                                    {#/if#}
                                                                    {#if $columnsType.$columnkey=='text'#}
                                                                        <span onclick="$(this).find('.view').hide();$(this).find('.edit').attr('type', 'text').focus();">
                                                                            <span class="view">{#$rowitem.$columnkey#}</span>
                                                                            <input type="hidden" class="edit" name="fields[{#$rowitem.id#}]{#$_subject#}[{#$columnkey#}]" value="{#$rowitem.$columnkey#}"onchange="$(this).parent().find('.view').css('color', 'red');" onblur="$(this).parent().find('.view').html($(this).val()).show();$(this).attr('type', 'hidden');">
                                                                        </span>
                                                                    {#else if $columnsType.$columnkey=='image'#}
                                                                        <img style="height:60px;" src="{#if $rowitem.$columnkey#}{#$__WEB_UPLOAD#}/image/{#$rowitem.$columnkey#}{#/if#}">
                                                                    {#else if $columnsType.$columnkey=='media'#}
                                                                        {#assign var="type" value=$columnkey|cat:"type"#}
                                                                        {#if $rowitem.$type=='image'#}
                                                                            <img style="height:60px;" src="{#if $rowitem.$columnkey#}{#$__WEB_UPLOAD#}/image/{#$rowitem.$columnkey#}{#/if#}">
                                                                        {#else if $rowitem.$type=='video'#}
                                                                            <video style="height:60px;" controls>
                                                                                <source src="{#if $rowitem.$columnkey#}{#$__WEB_UPLOAD#}/video/{#$rowitem.$columnkey#}{#/if#}">
                                                                            </video>
                                                                        {#/if#}
                                                                    {#else if $columnsType.$columnkey=='radio'#}
                                                                        {#assign var="options" value=$columnkey|cat:"options"#}
                                                                        <span onclick="$(this).find('.view').css('color', 'red').hide();$(this).find('.edit').show();">
                                                                            {#assign var="chooseVal" value=$rowitem.$columnkey#}
                                                                            <span class="view">{#$columnsType.$options.$chooseVal#}</span>
                                                                            <span class="edit" style="display: none;">
                                                                                {#foreach $columnsType.$options as $optionkey=>$optionitem#}
                                                                                    <input type="radio" name="fields[{#$rowitem.id#}]{#$_subject#}[{#$columnkey#}]" value="{#$optionkey#}" label="{#$optionitem#}" {#if $rowitem.$columnkey==$optionkey#}checked{#/if#} onchange="$(this).parent().hide();$(this).parent().parent().find('.view').html($(this).attr('label')).show();">{#$optionitem#}
                                                                                {#/foreach#}
                                                                            </span>
                                                                        </span>
                                                                    {#/if#}
                                                                {#else#}
                                                                    {#$rowitem.$columnkey#}
                                                                {#/if#}
                                                            </th>
                                                        {#/foreach#}
                                                        <td {#if $noedit || $rowitem.noedit#}class="hide"{#/if#}>
                                                            {#if $rowitem.CustomEditUrl#}
                                                                {#$EditUrl = $rowitem.CustomEditUrl#}
                                                            {#else#}
                                                                {#$EditUrl = '/be/'|cat:$_Module|cat:'/edit/id/'|cat:$rowitem.id#}
                                                                {#if $__TYPE#}
                                                                    {#$EditUrl = $EditUrl|cat:'/type/'|cat:$__TYPE#}
                                                                {#/if#}
                                                            {#/if#}
                                                            <a href="{#$EditUrl#}" class="btn btn-info btn-sm">
                                                                <span class="fa fa-edit"></span>
                                                            </a>
                                                            {#if $rowitem.copy#}
                                                                {#$rowitem.copy#}
                                                            {#/if#}
                                                            {#if $rowitem.preview#}
                                                                {#$rowitem.preview#}
                                                            {#/if#}
                                                            {#if $rowitem.customEdit#}
                                                                {#$rowitem.customEdit#}
                                                            {#/if#}
                                                            {#if $rowitem.list#}
                                                                {#$rowitem.list#}
                                                            {#/if#}
                                                        </td>
                                                    </tr>
                                                {#/foreach#}
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th {#if $noselect#}class="hide"{#/if#}></th>
                                                    {#foreach $columns as $key=>$item#}
                                                        <th>{#$item#}</th>
                                                    {#/foreach#}
                                                    <th {#if $noedit#}class="hide"{#/if#}>管理</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            {#include file=$__PublicView|cat:'backend_footer.tpl'#}
            {#$js#}
            {#$jsV2#}
            {#$xajax_js#}
        </div>
    </body>
</html>