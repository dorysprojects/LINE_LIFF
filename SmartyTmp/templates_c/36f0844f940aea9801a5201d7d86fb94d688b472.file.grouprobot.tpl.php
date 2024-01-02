<?php /* Smarty version Smarty3-b7, created on 2021-07-30 13:38:19
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/grouprobot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1311912646103904bd4a752-69238120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36f0844f940aea9801a5201d7d86fb94d688b472' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/grouprobot.tpl',
      1 => 1627622706,
    ),
  ),
  'nocache_hash' => '1311912646103904bd4a752-69238120',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">分享內容</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                *<label>分享標題</label>
                <input name="fields[subject][ShareTitle]" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['ShareTitle'];?>
" class="form-control" maxlength="50" placeholder="請輸入標題">
            </div>
            <div class="form-group">
                *<label>分享描述</label>
                <textarea name="fields[subject][ShareContent]" class="form-control" maxlength="500" placeholder="請輸入描述"><?php echo $_smarty_tpl->getVariable('row')->value['subject']['ShareContent'];?>
</textarea>
            </div>
            <div class="form-group">
                <label>前往投票-按鈕文字</label>
                <input name="fields[subject][Sharebtn0]" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['Sharebtn0'];?>
" class="form-control" maxlength="10" placeholder="前往投票">
            </div>
            <div class="form-group">
                <label>前往參加-按鈕文字</label>
                <input name="fields[subject][Sharebtn1]" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['Sharebtn1'];?>
" class="form-control" maxlength="10" placeholder="前往參加">
            </div>
            <div class="form-group">
                <label>活動說明-按鈕文字</label>
                <input name="fields[subject][Sharebtn2]" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['Sharebtn2'];?>
" class="form-control" maxlength="10" placeholder="活動說明">
            </div>
            <div class="form-group">
                <label>活動說明網址</label>
                <input name="fields[subject][EventDescription]" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['EventDescription'];?>
" class="form-control" maxlength="10" placeholder="請輸入活動說明網址">
            </div>
        </div>
    </div>
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">系統回覆</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label>重複投票得到的回覆</label>
                <textarea name="fields[content][RepeatVote]" class="form-control" maxlength="500" placeholder="你已經投過囉!"><?php echo $_smarty_tpl->getVariable('row')->value['content']['RepeatVote'];?>
</textarea>
            </div>
            <div class="form-group">
                <label>投票給自己的回覆</label>
                <textarea name="fields[content][VoteSelf]" class="form-control" maxlength="500" placeholder="無法投票給自己喔！"><?php echo $_smarty_tpl->getVariable('row')->value['content']['VoteSelf'];?>
</textarea>
            </div>
            <div class="form-group">
                <label>已是好友得到的回覆</label>
                <textarea name="fields[content][IsFriend]" class="form-control" maxlength="500" maxlength="50" placeholder="您在此活動前已是好友，因此無法參與投票"><?php echo $_smarty_tpl->getVariable('row')->value['content']['IsFriend'];?>
</textarea>
            </div>
        </div>
    </div>
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">投票結果</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label>查詢票數 (0票)</label>
                <input name="fields[content][NoVote]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['content']['NoVote'];?>
" maxlength="20" class="form-control" placeholder="你尚未獲得任何票數">
            </div>
            <div class="form-group">
                <label>查詢票數 (>0票)</label>
                <input name="fields[content][VoteCtn]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['content']['VoteCtn'];?>
" maxlength="20" class="form-control" placeholder="你已獲得【得票數】票">
                <div onclick="AddDisplayName(this, '(VoteCtn)');" class="btn btn-primary">得票數</div>
            </div>
            
            <div class="form-group">
                <label>已投票，但尚未加入好友的回覆</label>
                <textarea name="fields[content][NewMember]" class="form-control" maxlength="500" maxlength="50" placeholder="加【<?php echo $_smarty_tpl->getVariable('_LineAtName')->value;?>
】為好友，即可完成投票"><?php echo $_smarty_tpl->getVariable('row')->value['content']['NewMember'];?>
</textarea>
                <div onclick="AddDisplayName(this, '(Line@)');" class="btn btn-primary">官方帳號名稱</div>
            </div>
            <div class="form-group">
                <label>投票者成功投票得到的回覆</label>
                <textarea name="fields[content][VoteSuccess]" class="form-control" maxlength="500" placeholder="已成功投票給【參賽者名稱】"><?php echo $_smarty_tpl->getVariable('row')->value['content']['VoteSuccess'];?>
</textarea>
                <div onclick="AddDisplayName(this, '(Nickname)');" class="btn btn-primary">參賽者名稱</div>
            </div>
            <div class="form-group">
                <label>參賽者獲得票數得到的回覆</label>
                <textarea name="fields[content][GetVote]" class="form-control" maxlength="500" placeholder="【投票者名稱】在揪團活動「活動名稱」投票給你"><?php echo $_smarty_tpl->getVariable('row')->value['content']['GetVote'];?>
</textarea>
                <div onclick="AddDisplayName(this, '(Nickname)');" class="btn btn-primary">投票者名稱</div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        var ErrorMsg = '';
        $(document).on('change', '#StartDate, #EndDate', function(event) {
            ErrorMsg = '';
            if($('#EndDate').val() && $('#EndDate').val()){
                if($('#StartDate').val()>=$('#EndDate').val()){
                    ErrorMsg = '「結束日期」需大於「開始日期」';
                    $('#EndDate').val('');
                }
            }
            if(ErrorMsg){
                swal({type: 'error',title: '日期有誤',text:ErrorMsg,showConfirmButton: true});
            }
        });
    });
    function AddDisplayName(obj, myValue="(Nickname)") {
        var ChildList = obj.parentNode.childNodes;
        for(var i=0;i<ChildList.length;i++){
            if(ChildList[i].tagName==='TEXTAREA' || ChildList[i].tagName==='INPUT'){
                myField = ChildList[i];
            }
        };
        //IE support
        if (document.selection) {
            myField.focus();
            sel = document.selection.createRange();
            sel.text = myValue;
        }
        //MOZILLA and others
        else if (myField.selectionStart || myField.selectionStart == '0') {
            var startPos = myField.selectionStart;
            var endPos = myField.selectionEnd;
            myField.value = myField.value.substring(0, startPos)
                    + myValue
                    + myField.value.substring(endPos, myField.value.length);
            myField.selectionStart = startPos + myValue.length;
            myField.selectionEnd = startPos + myValue.length;
        } else {
            myField.value += myValue;
        }
        $(myField).keyup();
    }
</script>