<link rel="stylesheet" type="text/css" href="{#$__PLUGIN_Web#}/TagsInput/jquery.tagsinput.css">
<script src="{#$__PLUGIN_Web#}/TagsInput/jquery.tagsinput.js"></script>

<div class="form-group">
    <div class="" style="text-align: left;">
        <div>*<label>問題</label></div>
        <div class="TemplateContainer" style="overflow:auto;background-color:#fff;border: none;">
            <div class="TemplateSlider" style="width:3200px;">
                {#for $G=0 to 9#}
                    {#assign var="question" value="question"|cat:$G#}
                    {#assign var="type" value="type"|cat:$G#}
                    {#assign var="option" value="option"|cat:$G#}
                    <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;">
                        <div class="TemplateBtn" style="width:300px;height:35px;">
                            <span class="label label-success" style="padding:10px;float:left;">問題{#$G+1#}</span>
                            {#if $G!==0#}
                                <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeQuestionVal('left','{#$G#}');"><i class="fa fa-fw fa-arrow-left"></i></span>
                            {#/if#}
                            {#if $G!==9#}
                                <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeQuestionVal('right','{#$G#}');"><i class="fa fa-fw fa-arrow-right"></i></span>
                            {#/if#}
                            <span class="btn btn-sm label label-danger" style="padding:10px;float:left;margin-left:5px;" onclick="ClearQuestionData('{#$G#}');"><i class="fa fa-fw fa-trash"></i></span>
                        </div>
                        <div class="card-body" style="margin-top:5px;">
                            <input name="fields[subject][question{#$G#}]" type="text" maxlength="80" value="{#$row.subject.$question#}" class="form-control" style="width:300px;margin-top:5px;" placeholder="輸入問題">
                            <select name="fields[subject][type{#$G#}]" class="form-control Q_Type" style="width:300px;margin:5px 0px;" onchange="var ThisId=$(this).parent().find('.InputTag')[0].id;if($(this).val()==='radio' || $(this).val()==='checkbox' || $(this).val()==='select'){ $('#'+ThisId+'_tagsinput').removeClass('hide'); }else{ $('#'+ThisId+'_tagsinput').addClass('hide'); }">
                                <option value="">請選擇問題類型</option>
                                <option value="text" {#if $row.subject.$type=='text'#}selected{#/if#}>文字</option>
                                <option value="number" {#if $row.subject.$type=='number'#}selected{#/if#}>數字</option>
                                <option value="date" {#if $row.subject.$type=='date'#}selected{#/if#}>日期</option>
                                <option value="time" {#if $row.subject.$type=='time'#}selected{#/if#}>時間</option>
                                <option value="datetime" {#if $row.subject.$type=='datetime'#}selected{#/if#}>日期時間</option>
                                <option value="phone" {#if $row.subject.$type=='phone'#}selected{#/if#}>手機</option>
                                <option value="email" {#if $row.subject.$type=='email'#}selected{#/if#}>信箱</option>
                                <option value="location" {#if $row.subject.$type=='location'#}selected{#/if#}>地址</option>
                                <option value="radio" {#if $row.subject.$type=='radio'#}selected{#/if#}>單選</option>
                                <option value="checkbox" {#if $row.subject.$type=='checkbox'#}selected{#/if#}>多選</option>
                                <option value="select" {#if $row.subject.$type=='select'#}selected{#/if#}>下拉選單</option>
                                <option value="image" {#if $row.subject.$type=='image'#}selected{#/if#}>照片</option>
                                <option value="video" {#if $row.subject.$type=='video'#}selected{#/if#}>影片</option>
                                <option value="audio" {#if $row.subject.$type=='audio'#}selected{#/if#}>語音</option>
                                <option value="file" {#if $row.subject.$type=='file'#}selected{#/if#}>檔案</option>
                            </select>
                            <textarea name="fields[subject][option{#$G#}]" class="form-control InputTag" style="width:300px;margin-top:5px;">{#$row.subject.$option#}</textarea>
                        </div>
                    </div>
                {#/for#}
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('.InputTag').tagsInput({
            'onAddTag': function(tag){
                var tagList = tag.split(",");
                if(tagList.length>1){
                    $(this).removeTag(tag);
                }
                if($('#'+$(this)[0].id+'_tagsinput span.tag').length > 10){
                    $(this).removeTag(tag);
                }
            },
            'height': 'auto',
            'width': '300px',
            'interactive': true,
            'defaultText': '請貼上以「,」分隔的字串',
            'delimiter': [","], // Or a string with a single delimiter. Ex: ';'
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 0, // if not provided there is no limit
            'maxNumTags': 10,
            'placeholderColor': '#666666'
        });
        $('.Q_Type').change();
    });
    function ChangeQuestionVal(direction, Ctn){
        var NowCtn = Ctn*1;
        var Now_question = $("input[name='fields[subject][question"+ NowCtn +"]']").val();
        var Now_type = $("select[name='fields[subject][type"+ NowCtn +"]']").val();
        var Now_option = $("textarea[name='fields[subject][option"+ NowCtn +"]']").val();
        var Now_tagsId = $("textarea[name='fields[subject][option"+ NowCtn +"]']")[0].id;
        var Now_tagsinput = $('#'+Now_tagsId+'_tagsinput');
        
        if(direction==='right'){
            var NextCtn = NowCtn+1;
            var Next_question = $("input[name='fields[subject][question"+ NextCtn +"]']").val();
            var Next_type = $("select[name='fields[subject][type"+ NextCtn +"]']").val();
            var Next_option = $("textarea[name='fields[subject][option"+ NextCtn +"]']").val();
            var Next_tagsId = $("textarea[name='fields[subject][option"+ NextCtn +"]']")[0].id;
            var Next_tagsinput = $('#'+Next_tagsId+'_tagsinput');
            
            $("input[name='fields[subject][question"+ NowCtn +"]']").val(Next_question);
            $("select[name='fields[subject][type"+ NowCtn +"]']").val(Next_type);
            $("textarea[name='fields[subject][option"+ NowCtn +"]']").val(Next_option).attr('id', Next_tagsId).parent().append(Next_tagsinput);
            
            $("input[name='fields[subject][question"+ NextCtn +"]']").val(Now_question);
            $("select[name='fields[subject][type"+ NextCtn +"]']").val(Now_type);
            $("textarea[name='fields[subject][option"+ NextCtn +"]']").val(Now_option).attr('id', Now_tagsId).parent().append(Now_tagsinput);
        }else{
            var PrevCtn = NowCtn-1;
            var Prev_question = $("input[name='fields[subject][question"+ PrevCtn +"]']").val();
            var Prev_type = $("select[name='fields[subject][type"+ PrevCtn +"]']").val();
            var Prev_option = $("textarea[name='fields[subject][option"+ PrevCtn +"]']").val();
            var Prev_tagsId = $("textarea[name='fields[subject][option"+ PrevCtn +"]']")[0].id;
            var Prev_tagsinput = $('#'+Prev_tagsId+'_tagsinput');
            
            $("input[name='fields[subject][question"+ PrevCtn +"]']").val(Now_question);
            $("select[name='fields[subject][type"+ PrevCtn +"]']").val(Now_type);
            $("textarea[name='fields[subject][option"+ PrevCtn +"]']").val(Now_option).attr('id', Now_tagsId).parent().append(Now_tagsinput);
            
            $("input[name='fields[subject][question"+ NowCtn +"]']").val(Prev_question);
            $("select[name='fields[subject][type"+ NowCtn +"]']").val(Prev_type);
            $("textarea[name='fields[subject][option"+ NowCtn +"]']").val(Prev_option).attr('id', Prev_tagsId).parent().append(Prev_tagsinput);
        }
    }
    function ClearQuestionData(Ctn){
        $("input[name='fields[subject][question"+ Ctn +"]']").val('');
        $("select[name='fields[subject][type"+ Ctn +"]']").val('');
        $("textarea[name='fields[subject][option"+ Ctn +"]']").val('');
        $('#'+$("textarea[name='fields[subject][option"+ Ctn +"]']")[0].id+'_tagsinput>span.tag').remove();
    }
</script>