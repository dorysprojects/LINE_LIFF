<!DOCTYPE html>
<html lang="en">
    <head>
        <title>FLEX訊息模擬器</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="shortcut icon" href="https://developers.line.biz//flex-simulator/favicon.ico">
        
        <link href="{#$__PLUGIN_Web#}/bootstrap/font-awesome.min.css" rel="stylesheet">

        {#if 1#}
            <link href="{#$__PLUGIN_Web#}/flex/main.css?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}" rel="stylesheet">
            <link href="{#$__PLUGIN_Web#}/flex/vendors.css?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}" rel="stylesheet">
        {#else#}
            <link rel="stylesheet" type="text/css" href="https://developers.line.biz/flex-simulator/css/vendors-3d8ec47227cb7690303f.css">
            <link rel="stylesheet" type="text/css" href="https://developers.line.biz/flex-simulator/css/main-3d8ec47227cb7690303f.css">
        {#/if#}
        <link href="{#$__PLUGIN_Web#}/flex/custom.css?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}" rel="stylesheet">

        <script src="{#$__PLUGIN_Web#}/bootstrap/jquery-3.3.1.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/bootstrap/bootstrap.min.js"></script>
    </head>

    <body>
        <div id="app"></div>
        <script type="text/javascript" src="{#$__PLUGIN_Web#}/flex/vendors.js?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}"></script>
        <script type="text/javascript" src="{#$__PLUGIN_Web#}/flex/main.js?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}"></script>
    </body>
</html>