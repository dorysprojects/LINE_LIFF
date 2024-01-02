<?php /* Smarty version Smarty3-b7, created on 2022-09-01 14:08:09
         compiled from "/home1/bot.gadclubs.com/library/modules/_public/func//SortJs.php" */ ?>
<?php /*%%SmartyHeaderCode:141894705563104c49e3dc05-61235382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17471806cd56627ccb3e468c8f67b1e11128c5ba' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/_public/func//SortJs.php',
      1 => 1610443328,
    ),
  ),
  'nocache_hash' => '141894705563104c49e3dc05-61235382',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
    function ClearData(Ctn){
        $("input[name='fields[subject][img"+ Ctn +"]']").val('');
        $("#FILES_img" + Ctn).val('');
        $("#previews_img" + Ctn).attr('src', '#').hide();
        $("#previewsList_img" + Ctn).attr('src', '#').hide();
        $("input[name='fields[subject][subtitle"+ Ctn +"]']").val('');
        $("textarea[name='fields[subject][subcontent"+ Ctn +"]']").val('');
        for(var B_Ctn=0;B_Ctn<3;B_Ctn++){
            $("input[name='fields[subject][subject"+ Ctn+"_"+B_Ctn +"]']").val('');
            $("select[name='fields[subject][action"+ Ctn+"_"+B_Ctn +"]']").val('noaction');
            $("input[name='fields[subject][data"+ Ctn+"_"+B_Ctn +"]']").val('');
        }
    }
    function ChangeVal(direction, Ctn){
        var NowCtn = Ctn*1;
        var Now_img = $("input[name='fields[subject][img"+ NowCtn +"]']").val();
        var Now_file = $("#FILES_img" + NowCtn).val();
        var Now_preview = $("#previews_img" + NowCtn).attr('src');
        var Now_subtitle = $("input[name='fields[subject][subtitle"+ NowCtn +"]']").val();
        var Now_subcontent = $("textarea[name='fields[subject][subcontent"+ NowCtn +"]']").val();
        var previewsListImg = $("#previewsList_img0")[0] ? 1 : 0;
        
        if(direction==='right'){
            var NextCtn = NowCtn+1;
            var Next_img = $("input[name='fields[subject][img"+ NextCtn +"]']").val();
            var Next_file = $("#FILES_img" + NextCtn).val();
            var Next_preview = $("#previews_img" + NextCtn).attr('src');
            var Next_subtitle = $("input[name='fields[subject][subtitle"+ NextCtn +"]']").val();
            var Next_subcontent = $("textarea[name='fields[subject][subcontent"+ NextCtn +"]']").val();
            
            $("input[name='fields[subject][img"+ NowCtn +"]']").val(Next_img);
            $("#FILES_img" + NowCtn).val(Next_file);
            $("#previews_img" + NowCtn).attr('src', Next_preview);
            $("#previewsList_img" + NowCtn).attr('src', Next_preview);
            if(Next_preview!=='' && Next_preview!=='#'){
                if(previewsListImg && !(NowCtn===0 && $('input[name="fields[subject][topStyle]"]:checked').val()==='large')){
                    $("#previews_img" + NowCtn).hide();
                    $("#previewsList_img" + NowCtn).show();
                }else{
                    $("#previews_img" + NowCtn).show();
                    $("#previewsList_img" + NowCtn).hide();
                }
            }else{
                if(previewsListImg){
                    $("#previewsList_img" + NowCtn).hide(); 
                }
                $("#previews_img" + NowCtn).hide();
            }
            $("input[name='fields[subject][subtitle"+ NowCtn +"]']").val(Next_subtitle);
            $("textarea[name='fields[subject][subcontent"+ NowCtn +"]']").val(Next_subcontent);
            
            $("input[name='fields[subject][img"+ NextCtn +"]']").val(Now_img);
            $("#FILES_img" + NextCtn).val(Now_file);
            $("#previews_img" + NextCtn).attr('src', Now_preview);
            $("#previewsList_img" + NextCtn).attr('src', Now_preview);
            if(Now_preview!=='' && Now_preview!=='#'){
                if(previewsListImg && !(NextCtn===0 && $('input[name="fields[subject][topStyle]"]:checked').val()==='large')){
                    $("#previews_img" + NextCtn).hide();
                    $("#previewsList_img" + NextCtn).show();
                }else{
                    $("#previews_img" + NextCtn).show();
                    $("#previewsList_img" + NextCtn).hide();
                }
            }else{
                if(previewsListImg){
                    $("#previewsList_img" + NextCtn).hide();
                }
                $("#previews_img" + NextCtn).hide();
            }
            $("input[name='fields[subject][subtitle"+ NextCtn +"]']").val(Now_subtitle);
            $("textarea[name='fields[subject][subcontent"+ NextCtn +"]']").val(Now_subcontent);
        }else{
            var PrevCtn = NowCtn-1;
            var Prev_img = $("input[name='fields[subject][img"+ PrevCtn +"]']").val();
            var Prev_file = $("#FILES_img" + PrevCtn).val();
            var Prev_preview = $("#previews_img" + PrevCtn).attr('src');
            var Prev_subtitle = $("input[name='fields[subject][subtitle"+ PrevCtn +"]']").val();
            var Prev_subcontent = $("textarea[name='fields[subject][subcontent"+ PrevCtn +"]']").val();
            
            $("input[name='fields[subject][img"+ PrevCtn +"]']").val(Now_img);
            $("#FILES_img" + PrevCtn).val(Now_file);
            $("#previews_img" + PrevCtn).attr('src', Now_preview);
            $("#previewsList_img" + PrevCtn).attr('src', Now_preview);
            if(Now_preview!=='' && Now_preview!=='#'){
                if(previewsListImg && !(PrevCtn===0 && $('input[name="fields[subject][topStyle]"]:checked').val()==='large')){
                    $("#previews_img" + PrevCtn).hide();
                    $("#previewsList_img" + PrevCtn).show();
                }else{
                    $("#previews_img" + PrevCtn).show();
                    $("#previewsList_img" + PrevCtn).hide();
                }
            }else{
                if(previewsListImg){
                    $("#previewsList_img" + PrevCtn).hide();
                }
                $("#previews_img" + PrevCtn).hide();
            }
            $("input[name='fields[subject][subtitle"+ PrevCtn +"]']").val(Now_subtitle);
            $("textarea[name='fields[subject][subcontent"+ PrevCtn +"]']").val(Now_subcontent);
            
            $("input[name='fields[subject][img"+ NowCtn +"]']").val(Prev_img);
            $("#FILES_img" + NowCtn).val(Prev_file);
            $("#previews_img" + NowCtn).attr('src', Prev_preview);
            $("#previewsList_img" + NowCtn).attr('src', Prev_preview);
            if(Prev_preview!=='' && Prev_preview!=='#'){
                if(previewsListImg && !(NowCtn===0 && $('input[name="fields[subject][topStyle]"]:checked').val()==='large')){
                    $("#previews_img" + NowCtn).hide();
                    $("#previewsList_img" + NowCtn).show();
                }else{
                    $("#previews_img" + NowCtn).show();
                    $("#previewsList_img" + NowCtn).hide();
                }
            }else{
                if(previewsListImg){
                    $("#previewsList_img" + NowCtn).hide();
                }
                $("#previews_img" + NowCtn).hide();
            }
            $("input[name='fields[subject][subtitle"+ NowCtn +"]']").val(Prev_subtitle);
            $("textarea[name='fields[subject][subcontent"+ NowCtn +"]']").val(Prev_subcontent);
        }
        for(var B_Ctn=0;B_Ctn<3;B_Ctn++){
            var Now_subject = $("input[name='fields[subject][subject"+ NowCtn+"_"+B_Ctn +"]']").val();
            var Now_action = $("select[name='fields[subject][action"+ NowCtn+"_"+B_Ctn +"]']").val();
            var Now_data = $("input[name='fields[subject][data"+ NowCtn+"_"+B_Ctn +"]']").val();
            
            if(direction==='right'){
                var Next_subject = $("input[name='fields[subject][subject"+ NextCtn+"_"+B_Ctn +"]']").val();
                var Next_action = $("select[name='fields[subject][action"+ NextCtn+"_"+B_Ctn +"]']").val();
                var Next_data = $("input[name='fields[subject][data"+ NextCtn+"_"+B_Ctn +"]']").val();
                
                $("input[name='fields[subject][subject"+ NowCtn+"_"+B_Ctn +"]']").val(Next_subject);
                $("select[name='fields[subject][action"+ NowCtn+"_"+B_Ctn +"]']").val(Next_action);
                $("input[name='fields[subject][data"+ NowCtn+"_"+B_Ctn +"]']").val(Next_data);
                
                $("input[name='fields[subject][subject"+ NextCtn+"_"+B_Ctn +"]']").val(Now_subject);
                $("select[name='fields[subject][action"+ NextCtn+"_"+B_Ctn +"]']").val(Now_action);
                $("input[name='fields[subject][data"+ NextCtn+"_"+B_Ctn +"]']").val(Now_data);
            }else{
                var Prev_subject = $("input[name='fields[subject][subject"+ PrevCtn+"_"+B_Ctn +"]']").val();
                var Prev_action = $("select[name='fields[subject][action"+ PrevCtn+"_"+B_Ctn +"]']").val();
                var Prev_data = $("input[name='fields[subject][data"+ PrevCtn+"_"+B_Ctn +"]']").val();
                
                $("input[name='fields[subject][subject"+ PrevCtn+"_"+B_Ctn +"]']").val(Now_subject);
                $("select[name='fields[subject][action"+ PrevCtn+"_"+B_Ctn +"]']").val(Now_action);
                $("input[name='fields[subject][data"+ PrevCtn+"_"+B_Ctn +"]']").val(Now_data);
                
                $("input[name='fields[subject][subject"+ NowCtn+"_"+B_Ctn +"]']").val(Prev_subject);
                $("select[name='fields[subject][action"+ NowCtn+"_"+B_Ctn +"]']").val(Prev_action);
                $("input[name='fields[subject][data"+ NowCtn+"_"+B_Ctn +"]']").val(Prev_data);
            }
        }
    }
</script>