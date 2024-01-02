<!DOCTYPE html>
<html>
    <head>
        <title>{#$ProjectName#}</title>
        {#include file=$__PublicView|cat:'backend_head.tpl'#}
        <style>
            .form-group {
                display: flow-root;
            }
        </style>
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
                                <h3 class="box-title"></h3>
                                <input type="button" class="btn btn-default" name="cancel" value="返回列表">
                                <input type="button" class="btn btn-success" onclick="ChangeRichMenu();" value="更新選單">
                                <input type="button" class="btn btn-danger" onclick="ChangeRichMenu('unlink');" value="回復預設主選單">
                                <div class="box-tools pull-right">
                                    <button id="SubmitDataForm" type="submit" class="btn btn-success btn- hide"><span class="fa fa-save"></span></button>
                                    <button type="button" class="btn btn-box-tool hide" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-remove"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">篩選：</label>
                                        <div class="col-md-9">
                                            <div class="btn-group">
                                                <div class="input-group">
                                                    <input class="form-control" type="" id="search" placeholder="{#if $search#}{#$search#}{#else#}搜尋{#/if#}">
                                                    <div class="input-group-btn">
                                                        <input type="button" class="btn btn-primary button" onclick="xajax_SearchName($('#search').val());" value="搜尋">
                                                    </div>
                                                </div>
                                                <input class="btn btn-default button" type="button" onclick="xajax_SearchName();" value="顯示全部">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">選擇要更換主選單的會員：</label>
                                        <div class="col-md-9">
                                            {#if $MemberList#}
                                                <div class="checkbox">
                                                    <div class="checkbox-inline">
                                                        <input id="MemberALL" type="checkbox" onclick="SelectALL('Member');"/>
                                                        <label for="MemberALL" class="icon-checkmark" style="padding-left: 0px;">
                                                            <span>全選</span>
                                                        </label>
                                                    </div>
                                                    {#foreach $MemberList as $key=>$Member#}
                                                        {#if $Member.subject.displayName#}
                                                            <div class="checkbox-inline">
                                                                <input id="Member{#$key#}" type="checkbox" value="{#$Member.propertyA#}" class="Member" name="fields[Member]"/>
                                                                <label for="Member{#$key#}" class="icon-checkmark" style="padding-left: 0px;">
                                                                    <span>{#$Member.subject.displayName#}</span>
                                                                </label>
                                                            </div>
                                                        {#/if#}
                                                    {#/foreach#}
                                                </div>
                                            {#else#}
                                                <div class="form-group">查無會員</div>
                                            {#/if#}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">選擇要更換的主選單：</label>
                                        <div class="col-md-3">
                                            <select id="RichMenu" class="form-control RichMenu" name="fields[RichMenu]">
                                                <option value="">請選擇(回復預設主選單無需選擇)</option>
                                                {#foreach $RichMenuList as $key=>$RichMenu#}
                                                    <option value="{#$RichMenu.richMenuId#}">{#$RichMenu.name#} 【{#$RichMenu.chatBarText#}】<!----></option>
                                                {#/foreach#}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">

                            </div>
                        </div>
                    </form>
                </section>
            </div>
            {#include file=$__PublicView|cat:'backend_footer.tpl'#}
            <script>
                function SelectALL(obj){
                    $("." + obj).click();
                }
                function ChangeRichMenu(action){
                    var Member = [];
                    var Group = [];
                    var RichMenu = "";
                    var value = "";

                    for(var a=0;a<$(".Member").length;a++){
                        value = $(".Member").eq(a).val();
                        if($(".Member").get(a).checked == true){
                            Member.push(value);
                        }
                    }
                    RichMenu = $("#RichMenu").val();

                    xajax_ChangeRichMenu(Member, RichMenu, action);
                }
            </script>
            {#$js#}
            {#$xajax_js#}
        </div>
    </body>
</html>