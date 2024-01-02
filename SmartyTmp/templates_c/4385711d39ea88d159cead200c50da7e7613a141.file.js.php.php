<?php /* Smarty version Smarty3-b7, created on 2020-09-29 23:34:56
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/res/js.php" */ ?>
<?php /*%%SmartyHeaderCode:12157474675f735420a17c86-07408859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4385711d39ea88d159cead200c50da7e7613a141' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/res/js.php',
      1 => 1601393694,
    ),
  ),
  'nocache_hash' => '12157474675f735420a17c86-07408859',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<<?php ?>?php
    $test = '123';
?<??>>
<script type="text/javascript">
    console.log('<<?php ?>?php echo $test;?<??>>');
    $(function(){
        $("#SubmitDataForm").bind('click', function(event) {
            var tmp;
            var options = {
            target:        '#state'   
            ,beforeSubmit:  function(){
            swal({
                onOpen: function () {
                  swal.showLoading()
                },
                title: '處理中',showConfirmButton: false});
            },success: function (data, status){
                console.log(data);
                if(data.state){
                    location.href = '';
                }else{
                    swal({type: 'error',title: '新增失敗',text:data.msg,showConfirmButton: true});
                }
                $.unblockUI();
            }, error: function (data, status, e){
                //location.href="";		        	  
            } ,url:       'process/ps/AddRow'  
            ,type:      'post'   
            ,dataType:  'json'   
            }; 	
            $('#dataForm').ajaxSubmit(options); 
        });
    });
</script>