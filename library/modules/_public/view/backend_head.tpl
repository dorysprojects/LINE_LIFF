    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="想到什麼，就做什麼">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    {#assign var="_backend_" value=$__DOMAIN|cat:'_backend'#}
    {#assign var="_backend_value" value=$smarty.session.$_backend_#}
    {#if $_backend_value#}
        {#assign var="_authority" value=$_backend_value.subject.authority#}
        {#if $_backend_value.subject.img0#}
            <link rel="icon" type="image/png" href="{#$__WEB_UPLOAD#}/image/{#$_backend_value.subject.img0#}">
        {#/if#}
    {#/if#}
    
    <link href="{#$__PLUGIN_Web#}/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="{#$__PLUGIN_Web#}/bootstrap/font-awesome.min.css" rel="stylesheet">
    <link href="{#$__PLUGIN_Web#}/bootstrap/ionicons.min.css" rel="stylesheet">
    <link href="{#$__PLUGIN_Web#}/bootstrap/morris.css" rel="stylesheet">
    <link href="{#$__PLUGIN_Web#}/bootstrap/jquery-jvectormap.css" rel="stylesheet">
    <link href="{#$__PLUGIN_Web#}/bootstrap/AdminLTE.min.css?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}" rel="stylesheet">
    <link href="{#$__PLUGIN_Web#}/bootstrap/_all-skins.min.css" rel="stylesheet">
    <link href="{#$__PLUGIN_Web#}/bootstrap/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{#$__PLUGIN_Web#}/bootstrap/daterangepicker.css" rel="stylesheet">
    <link href="{#$__PLUGIN_Web#}/bootstrap/bootstrap3-wysihtml5.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{#$__PLUGIN_Web#}/blackUI/blackUI.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="{#$__RES_Web#}/css/app.css?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}" rel="stylesheet">
    
    <script src="{#$__PLUGIN_Web#}/bootstrap/jquery-3.3.1.min.js"></script>
    <script type='text/javascript' src='{#$__PLUGIN_Web#}/blackUI/blackUI.js'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.js"></script>
    <script src='{#$__PLUGIN_Web#}/bootstrap/form.js'></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    
    <!--<div id="ckeditortest"></div>
    <script>ckEditorInstall('ckeditortest');</script>-->
    <script>
        $('#dataTable').addClass('table-striped').hide();
        function ckEditorInstall(id){
            ClassicEditor.create(document.querySelector('#'+id))
                         .then(editor=>{ /*console.log(editor);*/ })
                         .catch(error=>{ /*console.error(error);*/ });
        }
        $(function () {
            $('#dataTable').DataTable();
            $('#dataTable').show();
        });
    </script>