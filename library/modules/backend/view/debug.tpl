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
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">開始日期</h3>
                                    </div>
                                    <div class="box-body">
                                        <input type="date" class="form-control" max="{#$Today#}" value="{#$date1#}" onchange="xajax_Session('date1', $(this).val(), 1);">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">結束日期</h3>
                                    </div>
                                    <div class="box-body">
                                        <input type="date" class="form-control" max="{#$Today#}" value="{#$date2#}" onchange="xajax_Session('date2', $(this).val(), 1);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <textarea style="padding: 20px;padding-bottom: 0px;width: -webkit-fill-available;height: -webkit-fill-available;" readonly>{#$error_log#}</textarea>
                        </div>
                    </div>
                </section>
            </div>
            {#include file=$__PublicView|cat:'backend_footer.tpl'#}
        </div>
        {#$js#}
        {#$xajax_js#}
    </body>
</html>