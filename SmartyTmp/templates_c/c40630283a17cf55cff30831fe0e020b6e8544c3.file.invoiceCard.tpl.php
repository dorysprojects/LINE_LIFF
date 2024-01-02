<?php /* Smarty version Smarty3-b7, created on 2021-07-30 13:54:43
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/invoiceCard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1602801529610394230eeb69-54292483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c40630283a17cf55cff30831fe0e020b6e8544c3' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/invoiceCard.tpl',
      1 => 1627622887,
    ),
  ),
  'nocache_hash' => '1602801529610394230eeb69-54292483',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<input name="FormType" type="hidden" value="card">
<div class="row">
    <div id="FormArea" class="col-md-12">
        <div class="col-md-12 form-group">
            <div class="col-md-4">
                <label>載具類型</label>
            </div>
            <div class="col-md-8">
                <select name="fields[cardType]" class="form-control">
                    <option value="">請選擇</option>
                    <option value="3J0002">手機條碼</option>
                    <option value="1K0001">悠遊卡</option>
                    <option value="1H0001">一卡通</option>
                    <option value="CQ0001">自然人憑證條碼</option>
                    <option value="EM0009">綠界科技</option>
                </select>
            </div>
            </br>
        </div>
        <div class="col-md-12 form-group">
            <div class="col-md-4">
                <label>手機/載具條碼</label><!-- 【載具號碼】 -->
            </div>
            <div class="col-md-8">
                <input type="text" name="fields[cardNo]" class="form-control" placeholder="請輸入手機/載具條碼" value="">
            </div>
            </br>
        </div>
        <div class="col-md-12 form-group">
            <div class="col-md-4">
                <label>手機/載具認證碼</label><!-- 【載具密碼】 -->
            </div>
            <div class="col-md-8">
                <input type="password" name="fields[cardEncrypt]" class="form-control" placeholder="請輸入手機/載具認證碼" value="">
            </div>
            </br>
        </div>
        <div class="col-md-12 form-group">
            <div class="col-md-4">
                <label>開始日期</label>
            </div>
            <div class="col-md-8">
                <input type="date" name="fields[startDate]" class="form-control" placeholder="請輸入開始日期" value="">
            </div>
            </br>
        </div>
        <div class="col-md-12 form-group">
            <div class="col-md-4">
                <label>結束日期</label>
            </div>
            <div class="col-md-8">
                <input type="date" name="fields[endDate]" class="form-control" placeholder="請輸入結束日期" value="">
            </div>
            </br>
        </div>
    </div>
    <div id="DetailsArea" class="col-md-12">

    </div>
</div>

<div class="col-md-12" style="text-align: center;">
    <button type="button" id="sendCardBtn" class="btn btn-primary" style="">送出資料</button>
    <button type="button" id="sendBtn" class="btn btn-primary" style="display: none;">進行登錄</button>
    <button type="button" id="ReturnBtn" onclick="$('#FormTitleIcon').addClass('fa-info-circle').removeClass('fa-list-alt');$('#FormTitle').html('輸入電子載具資訊');$('#FormArea').show();$('#sendCardBtn').show();$('#sendBtn').hide();$('#ReturnBtn').hide();$('#DetailsArea').hide().html('');" class="btn btn-warning" style="display: none;color: #fff;">回上一頁</button>
</div>

<script type="text/javascript">
    $(function () {
        $(document).on('click', '#sendBtn, #sendCardBtn', function(event) {
            var options = {
                target: '#state'
                , beforeSubmit: function () {
                    $.blockUI({message: '處理中...'});
                    $('.redBorder').removeClass('redBorder');
                }, success: function (data, status) {
                    if (data.state) {
                        if(event.target.id==='sendCardBtn'){
                            $('#FormArea').hide();
                            $('#DetailsArea').html('');
                            $('#sendCardBtn').hide();
                            $('#sendBtn').show();
                            $('#ReturnBtn').show();
                            $('#FormTitle').html('發票明細');
                            $('#FormTitleIcon').removeClass('fa-info-circle').addClass('fa-list-alt');
                            var Html = '';
                            console.log(data);
                            if(data.Data.details){
                                data.Data.details.forEach(function(item){
                                    Html += '<label class="">';
                                        Html += '<div class="col-md-12">';
                                            Html += '<div class="col-md-1">';
                                                Html += "<input type='radio' name='fields[choose]' value='"+ JSON.stringify(item) +"'>";
                                            Html += '</div>';
                                            Html += '<div class="col-md-11">';
                                                Html += '<div class="col-md-3">';
                                                    Html += '發票日期';
                                                Html += '</div>';
                                                Html += '<div class="col-md-9">';
                                                    Html += (item['invDate']['year']*1+1911) + '-' + ('0'+item['invDate']['month']).substr(-2) + '-' + ('0'+item['invDate']['date']).substr(-2);
                                                Html += '</div>';
                                                Html += '<div class="col-md-3">';
                                                    Html += '發票號碼';
                                                Html += '</div>';
                                                Html += '<div class="col-md-9">';
                                                    Html += item['invNum'].substr(0, 2) + '-' + item['invNum'].substr(2);
                                                Html += '</div>';
                                                if(item['buyerBan']){
                                                    Html += '<div class="col-md-3">';
                                                        Html += '統編';
                                                    Html += '</div>';
                                                    Html += '<div class="col-md-9">';
                                                        Html += item['buyerBan'];
                                                    Html += '</div>';
                                                }
                                                Html += '<div class="col-md-3">';
                                                    Html += '店家';
                                                Html += '</div>';
                                                Html += '<div class="col-md-9">';
                                                    Html += item['sellerName'];
                                                Html += '</div>';
                                                if(item['sellerAddress']){
                                                    Html += '<div class="col-md-3">';
                                                        Html += '地址';
                                                    Html += '</div>';
                                                    Html += '<div class="col-md-9">';
                                                        Html += item['sellerAddress'];
                                                    Html += '</div>';
                                                }
                                                Html += '<div class="col-md-3">';
                                                    Html += '金額';
                                                Html += '</div>';
                                                Html += '<div class="col-md-9">';
                                                    Html += item['amount'];
                                                Html += '</div>';
                                            Html += '</div>';
                                            Html += '<div class="col-md-12"><hr style="margin: 10px 0px;"></div>';
                                        Html += '</div>';
                                    Html += '</label>';
                                });
                            }
                            $('#DetailsArea').show().html(Html);
                        }else{
                            console.log(data);
                            if(data.Data){
                                switch($("input[name='FormType']").val()){
                                    case 'card':
                                        SendOrShareMsg(data.Data, 1, 1);
                                        break;
                                    case 'invoice':
                                        SendOrShareMsg(data.Data, 1, 1);
                                        break;
                                }
                            }
                        }
                    }else{
                        alert(data.msg);
                    }
                    $.unblockUI();
                }, error: function (data, status, e) {
                    //alert(data);
                }
                , url: '<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/?process/ps/exeEinvoice/targetId/' + event.target.id
                , type: 'post'
                , dataType: 'json'
            };
            $('#dataForm').ajaxSubmit(options);
        });
    });
</script>