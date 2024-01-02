<!DOCTYPE html>
<html>
    <head>
        <title>{#$ProjectName#}</title>
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
                                        
                                    </h3>
                                    <div class="form-inline">
                                        <input type="button" class="btn btn-default" name="cancel" value="返回列表">
                                        <div class="input-group">
                                            <input class="form-control" type="" id="search" placeholder="{#if $search#}{#$search#}{#else#}搜尋{#/if#}">
                                            <div class="input-group-btn">
                                                <input type="button" class="btn btn-primary button" onclick="xajax_SearchName($('#search').val());" value="搜尋">
                                            </div>
                                        </div>
                                        <input class="btn btn-info button" type="button" onclick="xajax_SearchName();" value="顯示全部">
                                    </div>
                                </div>
                                <div class="box-body">
                                    <form id="template_form">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>會員</th>
                                                    <th>RichMenu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {#foreach $MemberList as $key=>$Member#}
                                                    <tr>
                                                        <th>
                                                            <img style="max-width: 60px;max-height: 60px;" class="LineMemberImg img-circle img-thumbnail img-responsive" src="{#$Member.subject.pictureUrl#}">
                                                            {#$Member.subject.displayName#}
                                                        </th>
                                                        <th>
                                                            <select id="RichMenu{#$Member.propertyA#}" class="form-control RichMenu" style="display: {#if $Member.RichMenu#}block{#else#}none{#/if#};" onchange="xajax_ChangeRichMenu('{#$Member.propertyA#}', $(this).val(), '');if($(this).val()){ location.reload(); }">
                                                                <option value="">請選擇</option>
                                                                {#foreach $RichMenuList as $key=>$RichMenu#}
                                                                    <option value="{#$RichMenu.richMenuId#}" {#if $Member.RichMenu===$RichMenu.richMenuId#}selected{#/if#}>{#$RichMenu.name#} 【{#$RichMenu.chatBarText#}】</option>
                                                                {#/foreach#}
                                                            </select>
                                                            <div style="display: {#if $Member.RichMenu#}none{#else#}block{#/if#};" class="btn btn-success btn-sm" onclick="$('#RichMenu{#$Member.propertyA#}').show();">設定</div>
                                                            <div style="display: {#if $Member.RichMenu#}block{#else#}none{#/if#};" class="btn btn-danger btn-sm" onclick="xajax_ChangeRichMenu('{#$Member.propertyA#}', '', 'unlink');location.reload();">取消</div>
                                                        </th>
                                                    </tr>
                                                {#/foreach#}
                                            </tbody>
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
            {#$xajax_js#}
        </div>
    </body>
</html>