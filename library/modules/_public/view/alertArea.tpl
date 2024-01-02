{#if $_From=='backend' && $_Module!=='System' && $_Module!=='CustomerService'#}
    <ol class="breadcrumb">
        <li style="color: #777;"><i class="fa fa-home"></i></li>
        <li style="color: #777;">{#$ModuleNameList.$_Module#}</li>
        <li style="color: #3c8dbc;">{#$ActionNameList.$_ActionName#}</li>
    </ol>
{#/if#}
<div id="AlertMessage" class="alert alert-success" style="display: none;">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>success</strong>
    <span>success</span>
</div>
<script>
    var AlertTimeout;
    function AlertMsg(type='success', title, text, time=5000){
        window.clearTimeout(AlertTimeout);
        $('#AlertMessage').attr('class', "alert alert-"+type);//success,error(danger),warning,info
        $('#AlertMessage').show();
        $('#AlertMessage').find('strong').html(title);
        $('#AlertMessage').find('span').html(text);
        AlertTimeout = window.setTimeout(( () => $('#AlertMessage').hide() ), time);
    }
</script>