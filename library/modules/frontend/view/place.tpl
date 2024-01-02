<!DOCTYPE html>
<html>
    <head>
        <title>{#$ProjectName#}-{#if $SelectStrokeItem.propertyB#}{#$SelectStrokeItem.propertyB#}{#else#}全部{#/if#}</title>
        {#include file=$__PublicView|cat:'head.tpl'#}
        <!-- Github: https://github.com/bevacqua/dragula -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css">
        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js"></script>-->
        <script src="{#$__PLUGIN_Web#}/bootstrap/dragula.js?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}"></script>
    </head>

    <body onselectstart="return false">
        {#include file=$__PublicView|cat:'top.tpl'#}

        <style>
            #place_list {
                display: none;
            }
            .placeslide {
                background-color: #fff;
                margin: 20px;
            }
            .placeItem {
                padding: 0px 20px;
                padding-top: 10px;
                padding-bottom: 0px;
                color: #666;
                font-size: smaller;
            }
            .placeItem h4 {
                color: #000;
            }
            .placeItem hr {
                border-top-width: 1px;
                margin: 10px 0px;
            }
            .place {
                padding: 0px 20px;
                padding-top: 10px;
                padding-bottom: 0px;
                color: #666;
            }
            .place h4 {
                color: #000;
            }
            .place hr {
                border-top-width: 2px;
            }
            .place .list-group-item {
                border: none;
            }
            .place .list-group {
                margin-bottom: 0px;
            }
            #MapFrame {
                position: unset!important;
            }
            #MapFrame>div {
                overflow: hidden;
            }
            .ShowChange[show^="map"] {
                background-color: #f58e31;
                border: 1px #f58e31 solid;
                color: #fff;
            }
            .ShowChange[show^="list"] {
                background-color: #fff;
                border: 1px #f58e31 solid;
                color: #f58e31;
            }
            #OwnerArea {
                display: none;
                text-align: left;
                background-color: #fff;
                margin: 20px;
                margin-bottom: -30px;
                padding: 0px 20px;
                padding-top: 10px;
                padding-bottom: 0px;
            }
            #flex_Weight {
                position: absolute;
                z-index: 1;
                width: auto;
                right: 0px;
                top: 0px;
                margin: 5px;
            }
            #flex_Weight input[type="radio"] + label {
                margin: 0px;
                padding: 4px 5px;
                border-radius: 3px;
            }
            .FakeStroke{
                background-color: #fff;
                color: #f58e31;
                border: 1px #f58e31 solid;
                margin: 0px;
                padding: 5px 4px;
                padding-left: 5px;
                border-radius: 3px;
            }
            .FakeStroke i.fa {
                vertical-align: 2px;
            }
            #SelectStroke {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                opacity: 0;
                position: absolute;
                top: 0;
                width: 0px;
                height: 100%;
                margin-left: -6px;
            }
            .SearchList {
                width: auto;
                padding: 1px 5px;
                border-radius: 3px;
                margin-left: 3px;
            }
            .SearchList>i {
                font-size: x-small;
                vertical-align: 3px;
            }
            #ChooseActionArea #flex_Weight {
                position: relative;
                right: 0px;
            }
            #ChooseActionArea #flex_Weight input[type="radio"] + label {
                padding: 10px 20px;
                margin-bottom: 5px;
            }
            .press_background {
                z-index: 2;
            }
            #TripName, input[type^="date"], input[type^="number"] {
                display: inline-block;
                width: auto;
            }
            .DayItem {
                text-align: left;
                margin: 0px 20px;
                margin-top: 10px;
                cursor: grab;
            }
            .DayItem .ToggleBtn {
                float: right;
                margin-top: -7px;
                margin-right: -10px;
            }
            .DayItem .DayTitle {
                font-size: smaller;
            }
            .DayItem .btn {
                margin-right: 5px;
            }
            .DayItem .panel-body {
                padding: 0px 20px;
            }
            .DayItem .panel-body .DayTrip {
                padding: 20px 0px;
            }
            .TripItem {
                margin-top: 5px;
                cursor: grab;
            }
            .TripItem .ItemContent {
                display: inline-block;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                vertical-align: top;
                width: calc(100% - 35px);
            }
            .ItemContent>pre, .ItemContent>textarea {
                background-color: #fff;
                border-width: 1px;
                border-style: solid;
                border-color: #EEDBB5;
                border-radius: 8px;
                color: #8a6d3b;
                word-break: break-all;
                display: block;
                padding: 8px;
                margin: 0 0 10px;
                width: 100%;
                resize: none;
                white-space: pre-wrap;
            }
            #DeleteTrip, #CopyTrip, #ShowDay, #SaveTrip {
                margin: 5px;
                margin-top: 10px;
            }
            .TripForm {
                text-align: left;
                margin-bottom: 5px;
                margin-left: 20px;
            }
            #RecordBlockArea, #NoteEditArea {
                display: none;
            }
            #NoteEdit {
                width: 80%;
                display: inline-block;
            }
            #SearchListArea {
                display: none;
                position: absolute;
                z-index: 1;
                top: 40px;
                margin: 0px 20px;
                width: -webkit-fill-available;
            }
            .InTripState {
                background-color: #ffffff;
                padding: 1px 5px;
                display: inline-block;
                vertical-align: bottom;
                margin: 0px 5px;
                border: 1px solid #bbb;
                color: #bbb;
            }
            .InTripState.False {
                border-color: #d9534f;
                color: #d9534f;
            }
            .InTripState.False:before {
                content: "未加入"
            }
            .InTripState.True {
                border-color: #7ac57a;
                color: #7ac57a;
            }
            .InTripState.True:before {
                content: "已加入"
            }
            .EditHeader {
                margin-top: -10px;
                padding: 0px 15px;
                position: absolute;
                width: 100%;
                z-index: 2;
            }
            .EditHeader>i, .EditHeader>span {
                display: inline-block;
                font-size: 25px;
            }
            .EditHeader>i.Left {
                margin-top: 5px;
                margin-right: 10px;
                float: left;
            }
            .EditHeader>i.Right {
                margin-top: 5px;
                margin-left: 10px;
                float: right;
            }

            #addarea>#add_todo, #addarea>#add_note, #addarea>#add_cost {
                background-color: #e6e6e6;
                overflow: hidden;
            }
            .EditBody {
                overflow: auto;
                height: -webkit-fill-available;
                text-align: left;
                margin-top: 15px;
                padding-top: 10px;
                z-index: 1;
            }
            .EditBody>div {
                position: relative;
                margin-top: 10px;
            }
            .EditBody>div>i.fa-trash-o {
                position: absolute;
                font-size: 20px;
                color: #ff4646;
                margin-top: 6px;
                left: 5px;
            }
            .EditBody textarea.form-control {
                width: -webkit-fill-available;
                display: inline-block;
                padding-left: 30px;
                border: none;
                border-radius: unset;
                resize: none;
            }
            .EditBody input[type=text].form-control {
                width: calc(75% - 5px);
                display: inline-block;
                padding-left: 30px;
                border: none;
                border-radius: unset;
                resize: none;
            }
            .EditBody input[type=number].form-control {
                width: 25%;
                display: inline-block;
                border: none;
                border-radius: unset;
                resize: none;
            }
            #add_todo textarea.form-control {
                padding-right: 30px;
            }
            .flat-green[type=checkbox] {
                position: absolute;
                right: 20px;
                margin-top: 10px;
                cursor: pointer;
                font-size: 16px;
                width: 1px;
                height: 1px;
                background-color: #e6e6e6;
                visibility: hidden;
            }
            .flat-green[type=checkbox]:after {
                z-index: 1;
                position: absolute;
                display: inline-block;
                width: 20px;
                height: 20px;
                font-weight: bold;
                text-align: center;
                margin-top: -4px;
                margin-left: -4px;
                visibility: visible;
                {#if 1#}
                    content: " ";
                    background-color: #d7dcde;
                    color: #fff;
                    border-radius: 5px;
                {#else#}
                    content: "✓";
                    color: #d7dcde;
                    border-radius: 50%;
                    border: 1px solid;
                {#/if#}
            }
            .flat-green[type=checkbox]:checked:after {
                {#if 1#}
                    content: "✓";
                    background-color: #1abc9c;
                {#else#}
                    color: #1abc9c;
                {#/if#}
            }
        </style>
        <div id="signature-pad" class="signature-pad">
            {#include file=$__PublicView|cat:'project_details.tpl'#}
            <div id="place_add_background" class="press_background">
                <div id="place_add_background_area" class="press_button_area">
                    <div class="press_button AddGroup" onclick="$(this).parent().parent().hide();$('#OwnerArea').hide();$('#ChooseActionArea').hide();$('#ShowAction_search').prop('checked', true);$('#SearchBlockArea').show();$('#RecordBlockArea').hide();$('#SearchArea').show();$('#add_place').show();$('#PlaceResult').html('');"><i class="fa fa-fw fa-map-marker"></i> 店家</div>
                    <div class="press_button {#if $SelectStroke#}EditGroup{#else#}AddGroup{#/if#}" onclick="$(this).parent().parent().hide();$('#add_stroke').show();">
                        <svg style="height:12px;width:15px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marked-alt" class="svg-inline--fa fa-map-marked-alt fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="#fff" d="M288 0c-69.59 0-126 56.41-126 126 0 56.26 82.35 158.8 113.9 196.02 6.39 7.54 17.82 7.54 24.2 0C331.65 284.8 414 182.26 414 126 414 56.41 357.59 0 288 0zm0 168c-23.2 0-42-18.8-42-42s18.8-42 42-42 42 18.8 42 42-18.8 42-42 42zM20.12 215.95A32.006 32.006 0 0 0 0 245.66v250.32c0 11.32 11.43 19.06 21.94 14.86L160 448V214.92c-8.84-15.98-16.07-31.54-21.25-46.42L20.12 215.95zM288 359.67c-14.07 0-27.38-6.18-36.51-16.96-19.66-23.2-40.57-49.62-59.49-76.72v182l192 64V266c-18.92 27.09-39.82 53.52-59.49 76.72-9.13 10.77-22.44 16.95-36.51 16.95zm266.06-198.51L416 224v288l139.88-55.95A31.996 31.996 0 0 0 576 426.34V176.02c0-11.32-11.43-19.06-21.94-14.86z"></path>
                        </svg>
                         行程
                    </div>
                    {#if !$SelectStrokeItem || $userId==$SelectStrokeItem.propertyA#}
                        <div class="press_button AddGroup" onclick="$(this).parent().parent().hide();$('#add_manarger').show();"><i class="fa fa-fw fa-user-plus"></i> 管理者</div>
                    {#/if#}
                    <div class="press_button EditGroup" onclick="$(this).parent().parent().hide();$('#add_todo').show();"><i class="fa fa-fw  fa-check-circle-o"></i> 待辦</div>
                    <div class="press_button EditGroup" onclick="$(this).parent().parent().hide();$('#add_note').show();"><i class="fa fa-fw fa-file-text"></i> 筆記</div>
                    <div class="press_button EditGroup" onclick="$(this).parent().parent().hide();$('#add_cost').show();"><i class="fa fa-fw fa-credit-card"></i> 記帳</div>
                    <div class="press_button" onclick="$(this).parent().parent().hide();">取消</div>
                </div>
            </div>

            <div id="flex_Weight">
                <input type="radio" id="ShowType_map" name="ShowType" value="map" checked onchange="ShowChange($(this));">
                <label for="ShowType_map"><i class="fa fa-fw fa-map-o"></i></label>
                <input type="radio" id="ShowType_list" name="ShowType" value="list" onchange="ShowChange($(this));">
                <label for="ShowType_list"><i class="fa fa-fw fa-list-ul"></i></label>
                <span class="FakeStroke">
                    <i class="fa fa-fw fa-sort-down">
                        <select id="SelectStroke" class="form-control" onchange="xajax_Session('SelectStroke', $(this).val(), 1);">
                            <option value="" disabled>請選擇</option>
                            <option value="" {#if !$SelectStroke#}selected{#/if#}>全部</option>
                            {#foreach $GetStroke as $StrokeKey=>$StrokeItem#}
                                <option value="{#$StrokeItem.id#}" {#if $SelectStroke==$StrokeItem.id#}selected{#/if#}>[#{#$StrokeItem.id#}]{#$StrokeItem.propertyB#} ({#$StrokeItem.propertyC#})</option>
                            {#/foreach#}
                        </select>
                    </i>
                </span>
                <div class="btn_info SearchList" onclick="$('#SearchListArea').show();$('#SearchListBtn').focus();"><i class="fa fa-fw fa-search"></i></div>
            </div>
            <div class="signature-pad--body" style="overflow:auto;">
                <div id="SearchListArea">
                    <input id="SearchListBtn" type="text" style="" class="form-control" placeholder="輸入要搜尋的店家" onblur="$('#SearchListArea').hide();" onchange="SearchList($(this).val());" onkeyup="SearchList($(this).val());">
                </div>
                <div id="MapFrame" class=""></div>
                <div id="place_list">

                </div>
            </div>
            <div class="signature-pad--footer">
                <div id="addarea" style="">
                    <div id='NoteArea'>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div id="ProjectListBtn" class="button" onclick="$('#project_details').show();$('.press_button_area>#CloseBtn').show();"><i class="fa fa-fw fa-th-list"></i></div>
                                    <div class="button" onclick="$('.AddGroup').show();$('.EditGroup').hide();$('#place_add_background').show();"><i class="fa fa-fw fa-plus"></i></div>
                                    {#if $SelectStroke#}
                                        <div class="button" onclick="$('.AddGroup').hide();$('.EditGroup').show();$('#place_add_background').show();"><i class="fa fa-fw fa-wrench"></i></div>
                                    {#/if#}
                                    <div id="SendTripBtn" class="button"><i class="fa fa-fw fa-send"></i></div>
                                </div>
                                <div class="swiper-slide" style="display: none;">

                                </div>
                            </div>
                            <div class="swiper-pagination" style="margin-bottom: -15px;display: none;"></div>
                        </div>
                    </div>
                    <div id="add_stroke" class="EditArea">
                        {#$Html_close#}
                        <div class="TripForm">
                            <label for="TripName">設定行程名稱:</label>
                            <input id="TripName" class="form-control" type="text" value="{#if $SelectStrokeItem.propertyB#}{#$SelectStrokeItem.propertyB#}{#else#}行程{#date("YmdHis")#}{#/if#}">
                        </div>
                        <div class="TripForm">
                            <label for="ChooseDate">設定出發日:</label>
                            <input id="ChooseDate" class="form-control" type="date" min="{#date("Y-m-d")#}" value="{#if $SelectStrokeItem.propertyC#}{#$SelectStrokeItem.propertyC#}{#else#}{#date("Y-m-d")#}{#/if#}" onchange="ChangeDate();">
                        </div>
                        <div id="DayList">

                        </div>
                        {#if $SelectStrokeItem.id#}
                            <div id="DeleteTrip" class="btn btn-danger" onclick="if(confirm('確定要刪除「{#$SelectStrokeItem.propertyB#}」嗎?')){ xajax_DeleteTrip('{#$userId#}', '{#$SelectStrokeItem.id#}'); }"><i class="fa fa-fw fa-trash-o"></i> 刪除</div>
                            <div id="CopyTrip" class="btn btn-info" onclick="if(confirm('確定要複製「{#$SelectStrokeItem.propertyB#}」嗎?')){ xajax_CopyTrip('{#$userId#}', '{#$SelectStrokeItem.id#}'); }"><i class="fa fa-fw fa-copy"></i> 複製</div>
                        {#/if#}
                        <div id="ShowDay" class="btn btn-primary" onclick="ShowDay();"><i class="fa fa-fw fa-plus"></i> 新增天數</div>
                        <div id="SaveTrip" class="btn btn-success" onclick="SaveTrip();"><i class="fa fa-fw fa-save"></i> 儲存</div>
                    </div>
                    <div id="add_place" class="EditArea">
                        {#$Html_close#}
                        <div id="ChooseActionArea">
                            <div id="flex_Weight">
                                <input type="radio" id="ShowAction_search" name="ShowAction" value="search" checked onchange="ActionChange($(this));">
                                <label for="ShowAction_search"><i class="fa fa-fw fa-search"></i>搜尋</label>
                                <input type="radio" id="ShowAction_record" name="ShowAction" value="record" onchange="ActionChange($(this));">
                                <label for="ShowAction_record"><i class="fa fa-fw fa-history"></i>記錄</label>
                                <input type="radio" id="ShowAction_note" name="ShowAction" value="note" onchange="ActionChange($(this));">
                                <label for="ShowAction_note"><i class="fa fa-fw fa-edit"></i>筆記</label>
                                <input id="SearchRecord" type="text" style="vertical-align: bottom;" class="form-control" placeholder="輸入要搜尋的店家" onchange="SearchRecord($(this).val());" onkeyup="SearchRecord($(this).val());">
                            </div>
                        </div>
                        <div id="SearchBlockArea">
                            <div id="SearchArea">
                                <input id='SearchPlace' type="text" style="min-width: 150px;width: 30%;display: inline-block;vertical-align: bottom;" class="form-control" placeholder="輸入要搜尋的店家">
                                <div class="btn btn-primary" onclick="if($('#SearchPlace').val()){ if(confirm('確定要搜尋「'+$('#SearchPlace').val()+'」嗎? (將會扣除API的呼叫額度)')){ xajax_search('{#$userId#}', $('#SearchPlace').val()); } }">搜尋</div>
                            </div>
                            <br>
                            <div id="OwnerArea">
                                (創建人: <span id="Owner">XX</span>)
                            </div>
                            <div id="PlaceResult">

                            </div>
                        </div>
                        <div id="RecordBlockArea">

                        </div>
                        <div id="NoteEditArea">
                            <textarea id="NoteEdit" class="form-control" placeholder="輸入想新增的筆記"></textarea>
                            <br>
                            <span class="btn btn-xs btn-success AddIn" onclick="AddIn($(this));"><i class="fa fa-fw fa-calendar-plus-o"></i></span>
                        </div>
                    </div>
                    <div id="add_manarger" class="EditArea">
                        {#$Html_close#}
                        <div class="word_div">已邀請</div>
                        {#foreach $manager_list as $managerkey=>$manageritem#}
                            <div class="manager_block" NO="{#$manageritem.id#}">
                                <img class="pic" src="{#$manageritem.subject.pictureUrl#}">
                                <div class="name">{#$manageritem.subject.displayName#}</div>
                                <i class="fa fa-close" onclick="RemoveManager($(this).parents('.manager_block'));" style="font-size: 30px;position: absolute;margin-left: -30px;padding: 0px 4px 4px 4px;background-color: #00000080;"></i>
                            </div>
                        {#/foreach#}
                        <br><br>
                        <div class="button" onclick="ShareNote();" style="position: absolute;bottom: 10px;left: 30px;">邀請好友</div>
                    </div>
                    <div id="RemarksArea" class="EditArea">
                        {#$Html_close#}
                        <br><br>
                        <textarea id="Remarks" class="form-control" style="width: 80%;margin: auto;" placeholder="輸入想新增的備註"></textarea>
                        <br>
                        <span class="btn btn-success" onclick="if($('#Remarks').attr('placeId')){ xajax_SaveRemark($('#Remarks').attr('placeId'), $('#Remarks').val()); }"><i class="fa fa-fw fa-save"></i> 儲存</span>
                    </div>

                    <div id="add_todo" class="EditArea">
                        <div class="EditHeader" style="background-color: #60c751;color: #fff;">
                            <i class="fa fa-plus-circle Left" onclick="AddInfo('add_todo');"></i>
                            <i class="fa fa-save Left" onclick="SaveInfo('add_todo');"></i>
                            <span>待辦事項列表</span>
                            <i class="fa fa-close Right" onclick="$(this).parent().parent().hide();"></i>
                        </div>
                        <div class="EditBody">
                            {#foreach $SelectStrokeItem.subject.todo.item as $key=>$value#}
                                <div class="" title="待辦事項">
                                    <i class="fa fa-trash-o" onclick="if(!$(this).parent().find('textarea').val() || confirm('確定要刪除此「'+ $(this).parent().attr('title') +'」嗎?')===true){ $(this).parent().remove(); }"></i>
                                    <textarea class="form-control" rows="1" placeholder="例：必買伴手禮">{#$SelectStrokeItem.subject.todo.item.$key#}</textarea>
                                    <input type="checkbox" class="flat-green" {#if $SelectStrokeItem.subject.todo.checked.$key#}checked{#/if#}>
                                </div>
                            {#/foreach#}
                        </div>
                    </div>
                    <div id="add_note" class="EditArea">
                        <div class="EditHeader" style="background-color: #56429a;color: #fff;">
                            <i class="fa fa-plus-circle Left" onclick="AddInfo('add_note');"></i>
                            <i class="fa fa-save Left" onclick="SaveInfo('add_note');"></i>
                            <span>行程筆記</span>
                            <i class="fa fa-close Right" onclick="$(this).parent().parent().hide();"></i>
                        </div>
                        <div class="EditBody">
                            {#foreach $SelectStrokeItem.subject.note.item as $key=>$value#}
                                <div class="" title="行程筆記">
                                    <i class="fa fa-trash-o" onclick="if(!$(this).parent().find('textarea').val() || confirm('確定要刪除此「'+ $(this).parent().attr('title') +'」嗎?')===true){ $(this).parent().remove(); }"></i>
                                    <textarea class="form-control" rows="1" placeholder="例：伴手禮買了2盒">{#$SelectStrokeItem.subject.note.item.$key#}</textarea>
                                </div>
                            {#/foreach#}
                        </div>
                    </div>
                    <div id="add_cost" class="EditArea">
                        <div class="EditHeader" style="background-color: #c77551;color: #fff;">
                            <i class="fa fa-plus-circle Left" onclick="AddInfo('add_cost');"></i>
                            <i class="fa fa-save Left" onclick="SaveInfo('add_cost');"></i>
                            <span>消費記帳</span>
                            <i class="fa fa-close Right" onclick="$(this).parent().parent().hide();"></i>
                            <div id="costTotalArea" style="background-color: #c77551;color: #fff;">
                                <span>Total：</span>
                                <span id="costTotal">0</span>
                            </div>
                        </div>
                        <div class="EditBody">
                            {#foreach $SelectStrokeItem.subject.cost.item as $key=>$value#}
                                <div class="" title="消費記帳">
                                    <i class="fa fa-trash-o" onclick="if((!$(this).parent().find('input[type=text]').val()&&!$(this).parent().find('input[type=number]').val()) || confirm('確定要刪除此「'+ $(this).parent().attr('title') +'」嗎?')===true){ $(this).parent().remove(); }"></i>
                                    <input type="text" value="{#$SelectStrokeItem.subject.cost.item.$key#}" class="form-control" placeholder="項目" />
                                    <input type="number" value="{#$SelectStrokeItem.subject.cost.price.$key#}" class="form-control costItem" onchange="updateTotal();" min="0" placeholder="金額" />
                                </div>
                            {#/foreach#}
                        </div>
                    </div>
                </div>

                <div class="signature-pad--actions" style="display:none">
                    <select id="DefaultSubcategory" class="btn_info word_input" style="display: none;">
                        <option value="">請選擇</option>
                        {#foreach $subcategory_list as $subcategorykey=>$subcategoryitem#}
                            {#if $subcategoryitem.propertyB != ''#}
                                <option value="{#$subcategoryitem.id#}" prevlevel="{#$subcategoryitem.prev#}">{#$subcategoryitem.propertyB#}</option>
                            {#/if#}
                        {#/foreach#}
                    </select>
                </div>
            </div>
        </div>

        <script>
            function updateTotal(){
                var total = 0;
                $('.costItem').each(function(e) {
                    total += $(this).val()*1;
                });
                $('#costTotal').html(total.toLocaleString('zh-TW', { style: 'currency', currency: 'TWD' }));
            }
            var _userList={#json_encode($userList)#}, _SelectStrokeList={#json_encode($SelectStrokeList)#}, DayCtn=0, NowDayCtn, ChooseWeekDay=new Date().getDay(), weekdayList = ['日', '一', '二', '三', '四', '五', '六'];
            function GetDayShow(Ctn){
                var DateText, DayShow;
                if(!$('#ChooseDate').val()){
                    $('#ChooseDate').val('{#date("Y-m-d")#}');
                }
                var ChooseDate = new Date($('#ChooseDate').val());
                ChooseDate.setDate(ChooseDate.getDate()*1+Ctn*1);
                DateText = ChooseDate.getFullYear()+'/'+(ChooseDate.getMonth()*1+1)+'/'+ChooseDate.getDate()+' 週'+weekdayList[ChooseDate.getDay()];
                DayShow = ' 第'+(Ctn+1)+'天('+ DateText +') ';

                return DayShow;
            }
            function ChangeDate(){
                NowDayCtn = 0;
                $('.DayItem').each(function(e) {
                    var _DayItem = $(this);
                    _DayItem.attr('DayCtn', NowDayCtn);
                    _DayItem.find('.Toggle').attr('id', 'collapse'+NowDayCtn);
                    _DayItem.find('.ToggleBtn').attr('href', '#collapse'+NowDayCtn);
                    var ChooseDate = new Date($('#ChooseDate').val());
                    ChooseDate.setDate(ChooseDate.getDate()*1+NowDayCtn*1);
                    _DayItem.find('span.DayTitle').html(GetDayShow(NowDayCtn));
                    _DayItem.find('.DayTrip .TripItem').each(function(e) {
                        var _TripItem = $(this);
                        if(_TripItem.attr('data-Json')){
                            var dataJson = JSON.parse(_TripItem.attr('data-Json'));
                            var dataId = _TripItem.attr('data-id');
                            var d = ChooseDate.getDay();

                            var Color='', Text='';
                            if(dataJson['periods']){
                                if(dataJson['periods'][d]){
                                    Color = '5cb85c';
                                    Text = weekdayList[d] + ': ';
                                    var pCtn = 0;
                                    dataJson['periods'][d].forEach(function(period){
                                        if(pCtn!==0){
                                            Text += ', ';
                                        }
                                        Text += period['open'].substr(0,2)+':'+period['open'].substr(2,2) + '~' + period['close'].substr(0,2)+':'+period['close'].substr(2,2);
                                        pCtn++;
                                    });
                                }else{
                                    Color = 'd9534f';
                                    Text = weekdayList[d] + ': 休息';
                                }
                            }else{
                                Color = 'ffd02c';
                                Text = '無提供營業時間';
                            }
                            _TripItem.find('span.periods').parent().html('<i class="fa fa-fw fa-clock-o" style="color: #'+ Color +';"></i><span class="periods" WeekDay="'+d+'" style="color: #'+ Color +';">'+ Text +'</span>');
                        }
                    });
                    NowDayCtn++;
                });
                $('#add_place').hide();
            }
            function OpenDay(obj){
                if(obj.find('.fa').hasClass('fa-angle-down')){
                    obj.find('.fa').removeClass('fa-angle-down').addClass('fa-angle-up');
                }else{
                    obj.find('.fa').removeClass('fa-angle-up').addClass('fa-angle-down');
                }
            }
            function ShowDay(){
                var DayCtn = 0;
                $('.DayItem').each(function(e) {
                    if($(this).css('display')!=='none'){
                        DayCtn++;
                    }
                });
                if(DayCtn<10){
                    $('.DayItem').eq(DayCtn).show();
                    DayCtn++;
                    if(DayCtn===10){
                        $('#ShowDay').hide();
                    }else{
                        $('#ShowDay').show();
                    }
                }else{
                    alert('最多'+ DayCtn +'天');
                }
            }
            function AddDay(){
                var DayCtn = $('.DayItem').length;
                var _Day = '<div class="DayItem panel panel-default" DayCtn="'+(DayCtn)+'">'+
                                '<div class="panel-heading">'+
                                    '<h4 class="panel-title">'+
                                        '<div class="btn btn-xs btn-danger" onclick="DeleteDay($(this));"><i class="fa fa-fw fa-trash-o"></i></div>'+
                                        '<div class="btn btn-xs btn-primary AddTripBtn" onclick="AddTrip($(this));"><i class="fa fa-fw fa-plus"></i></div>'+
                                        '<span class="DayTitle">'+ GetDayShow(DayCtn) +'</span>'+
                                        '<a class="ToggleBtn" data-toggle="collapse" href="#collapse'+DayCtn+'">'+
                                            '<div class="btn" onclick="OpenDay($(this));"><i class="fa fa-fw fa-angle-up"></i></div>'+
                                        '</a>'+
                                    '</h4>'+
                                '</div>'+
                                '<div id="collapse'+DayCtn+'" class="Toggle panel-collapse collapse">'+
                                    '<div class="panel-body">'+
                                        '<div class="DayTrip"></div>'+
                                    '</div>'+
                                '</div>'+
                           '</div>';
                $('#DayList').append(_Day);
                AddPress($('#DayList>.DayItem>.panel-heading').last()[0]);
            }
            function DeleteDay(obj){
                if(confirm('確定要刪除「第'+ (obj.parents('.DayItem').attr('DayCtn')*1+1) +'天」嗎?')){
                    $('#ShowDay').show();
                    var ThisDayItem = obj.parents('.DayItem');
                    ThisDayItem.find('.DayTrip').html('');
                    ThisDayItem.hide();
                    $('#DayList').append(ThisDayItem);
                    var _Ctn = 0;
                    $('.DayItem').each(function(e) {
                        $(this).attr('DayCtn', _Ctn);
                        $(this).find('.ToggleBtn').attr('href', '#collapse'+_Ctn);
                        $(this).find('.Toggle').attr('id', 'collapse'+_Ctn);
                        $(this).find('span.DayTitle').html(GetDayShow(_Ctn));
                        _Ctn++;
                    });
                }
            }
            function AddTrip(obj){
                var _DayItem = obj.parents('.DayItem');
                NowDayCtn = _DayItem.attr('DayCtn');

                if($('#ChooseDate').val()){
                    var ChooseDate = new Date($('#ChooseDate').val());
                    ChooseDate.setDate(ChooseDate.getDate()*1+NowDayCtn*1);
                    $('.recordItem .periods').css('color', '#fff').hide().parent().find('.fa-clock-o').css('color', '#4285f4');
                    $('.recordItem .periods[WeekDay="'+ChooseDate.getDay()+'"]').show();
                    $('.recordItem .periods[WeekDay="'+ChooseDate.getDay()+'"]').each(function(e) {
                        if($(this).html().indexOf("休息") !== -1){
                            $(this).css('color', '#d9534f').parent().find('.fa-clock-o').css('color', '#d9534f');
                            $(this).parents('.recordItem').find('.AddIn').removeClass('btn-success').addClass('btn-danger');
                        }else if($(this).html().indexOf("無提供營業時間") !== -1){
                            $(this).css('color', '#ffd02c').parent().find('.fa-clock-o').css('color', '#ffd02c');
                            $(this).parents('.recordItem').find('.AddIn').removeClass('btn-success').addClass('btn-danger');
                        }else{
                            $(this).css('color', '#5cb85c').parent().find('.fa-clock-o').css('color', '#5cb85c');
                            $(this).parents('.recordItem').find('.AddIn').addClass('btn-success').removeClass('btn-danger');
                        }
                    });
                }

                $('#OwnerArea').hide();
                $('#add_place').show();
                $('#ChooseActionArea').show();
                $('#PlaceResult').html('');
                $('#SearchPlace').val('');
                $('#ShowAction_record').click();
            }
            function ChangeTagName(obj, NewTagName=''){
                if(obj[0] && obj.parent()[0] && NewTagName){
                    var Attr = '';
                    $.each(obj['0']['attributes'], function() {
                        Attr += ' '+this.name+'="'+this.value+'"';
                    });
                    var OldTagName = obj.get(0).tagName;
                    if(OldTagName !== NewTagName){
                        var OldHtml = null;
                        switch(OldTagName){
                            case 'TEXTAREA':
                                OldHtml = obj.val();
                                break;
                            case 'PRE':
                            default:
                                OldHtml = obj.html();
                                break;
                        }
                        var ObjParent = obj.parent();
                        ObjParent.html('<'+NewTagName+Attr+'>'+OldHtml+'</'+NewTagName+'>');
                        ObjParent.find(NewTagName).focus();
                    }
                }
            }
            function RemoveTrip(obj, dataId){
                obj.parent().remove();
                if($('.TripItem[data-id="'+dataId+'"]').length===0){
                    $('.recordItem[data-id="'+dataId+'"] .InTripState').removeClass('True').addClass('False');
                }
            }
            function AddIn(obj){
                var ChooseDate = new Date($('#ChooseDate').val());
                ChooseDate.setDate(ChooseDate.getDate()*1+NowDayCtn*1);
                if(obj.parent()[0].id === 'NoteEditArea'){
                    if($('#NoteEdit').val()){
                        var Html =  '<div class="TripItem" data-id="Note" data-Json="">'+
                                        '<span class="btn btn-xs btn-danger" onclick="$(this).parent().remove();"><i class="fa fa-fw fa-close"></i></span>'+
                                        '<span class="ItemContent">'+
                                            '<pre onclick="ChangeTagName($(this), '+"'"+'TEXTAREA'+"'"+');" onchange="ChangeTagName($(this), '+"'"+'PRE'+"'"+');" onblur="ChangeTagName($(this), '+"'"+'PRE'+"'"+');">'+ $('#NoteEdit').val() +'</pre>'+
                                        '</span>'+
                                    '</div>';
                        $('#NoteEdit').val('');
                    }else{
                        return;
                    }
                }else{
                    var recordItem = obj.parents('.recordItem');
                    var dataId = recordItem.attr('data-id');
                    $('.recordItem[data-id="'+dataId+'"] .InTripState').removeClass('False').addClass('True');
                    var dataJson = JSON.parse(recordItem.attr('data-json'));
                    var Remarks = (dataJson['Remarks']) ? ' ('+dataJson['Remarks']+')' : '';
                    var Html =  '<div class="TripItem" data-id="'+dataId+'" data-Json='+"'"+recordItem.attr('data-json')+"'"+'>'+
                                    '<span class="btn btn-xs btn-danger" onclick="RemoveTrip($(this), \''+dataId+'\');"><i class="fa fa-fw fa-close"></i></span>'+
                                    '<span class="ItemContent">'+
                                        '<a target="_blank" href="https://www.google.com.tw/maps/dir//'+dataJson['name']+' '+dataJson['formatted_address']+'/@'+dataJson['geometry']['location']['lat']+','+dataJson['geometry']['location']['lng']+',12z"><span> '+dataJson['name']+Remarks+' </span></a></br>'+
                                        '<span> '+recordItem.find('.periods').parent().find('i.fa-clock-o')[0].outerHTML+recordItem.find('.periods[WeekDay="'+ChooseDate.getDay()+'"]')[0].outerHTML+' </span>'+
                                    '</span>'+
                                '</div>';
                }

                $('.DayItem[DayCtn="'+NowDayCtn+'"] .ToggleBtn>btn>i').removeClass('fa-angle-down').addClass('fa-angle-up');
                if(!$('#collapse'+NowDayCtn).hasClass('in')){
                    $('.DayItem[DayCtn="'+NowDayCtn+'"] .ToggleBtn .btn').click();
                }
                $('#collapse'+NowDayCtn+' .DayTrip').append(Html);
                AddPress($('#collapse'+NowDayCtn+' .DayTrip>.TripItem').last()[0]);
                $('#add_place').hide();
            }
            function SaveTrip(){
                var SaveTripList = [];
                var PlaceCtn = 0;
                $('.DayItem').each(function(e) {
                    if($(this).css('display')!=='none'){
                        var _DayCtn = $(this).attr('DayCtn');
                        var ThisTripList = [];
                        $(this).find('#collapse'+_DayCtn+' .DayTrip>.TripItem').each(function(e) {
                            if($(this).attr('data-id')==='Note'){
                                var NoteVal = ($(this).find('.ItemContent>pre')[0]) ? $(this).find('.ItemContent>pre').html() : $(this).find('.ItemContent>textarea').val();
                                ThisTripList.push('Note_'+NoteVal);
                            }else{
                                ThisTripList.push($(this).attr('data-id'));
                                PlaceCtn++;
                            }
                        });
                        SaveTripList[_DayCtn] = ThisTripList;
                    }
                });

                var ErrorMsg = '';
                if(!$('#TripName').val()){
                    ErrorMsg += "行程名稱 未設定";
                }
                if(!$('#ChooseDate').val()){
                    ErrorMsg += (ErrorMsg) ? "\n" : "";
                    ErrorMsg += "出發日 未設定";
                }
                if(PlaceCtn===0){
                    ErrorMsg += (ErrorMsg) ? "\n" : "";
                    ErrorMsg += "至少設定一天行程";
                }
                if(ErrorMsg){
                    alert(ErrorMsg);
                }else{
                    xajax_SaveTrip('{#$userId#}', '{#$SelectStrokeItem.id#}', $('#TripName').val(), $('#ChooseDate').val(), JSON.stringify(SaveTripList));
                }
            }
            function AddInfo(action=null){
                var Html='', EditBody=$('#'+ action +'>.EditBody'), Msg="確定要刪除此「\' + $(this).parent().attr(\'title\') + \'」嗎?";
                switch(action){
                    case 'add_todo':
                        Html = '<div class="" title="待辦事項">\
                                    <i class="fa fa-trash-o" onclick="if(!$(this).parent().find(\'textarea\').val() || confirm(\''+ Msg +'\')===true){ $(this).parent().remove(); }"></i>\
                                    <textarea class="form-control" rows="1" placeholder="例：必買伴手禮"></textarea>\
                                    <input type="checkbox" class="flat-green">\
                                </div>';
                        break;
                    case 'add_note':
                        Html = '<div class="" title="行程筆記">\
                                    <i class="fa fa-trash-o" onclick="if(!$(this).parent().find(\'textarea\').val() || confirm(\''+ Msg +'\')===true){ $(this).parent().remove(); }"></i>\
                                    <textarea class="form-control" rows="1" placeholder="例：伴手禮買了2盒"></textarea>\
                                </div>';
                        break;
                    case 'add_cost':
                        Html = '<div class="" title="消費記帳">\
                                    <i class="fa fa-trash-o" onclick="if((!$(this).parent().find(\'input[type=text]\').val()&&!$(this).parent().find(\'input[type=number]\').val()) || confirm(\''+ Msg +'\')===true){ $(this).parent().remove(); }"></i>\
                                    <input type="text" class="form-control" placeholder="項目" />\
                                    <input type="number" class="form-control" min="0" placeholder="金額" />\
                                </div>';
                        break;
                }
                if(action && Html){
                    EditBody.append(Html);
                    scrollToLast(action);
                }
            }
            function SaveInfo(action=null){
                var EditBody=$('#'+ action +'>.EditBody').children(), SaveJson={};
                var saveAction = '';
                EditBody.each(function(e) {
                    switch(action){
                        case 'add_todo':
                            saveAction = 'todo';
                            if(!SaveJson['item']){
                                SaveJson['item'] = [];
                                SaveJson['checked'] = [];
                            }
                            if($(this).find('textarea').val()){
                                SaveJson['item'].push($(this).find('textarea').val());
                                SaveJson['checked'].push($(this).find('input[type="checkbox"]').prop('checked'));
                            }
                            break;
                        case 'add_note':
                            saveAction = 'note';
                            if(!SaveJson['item']){
                                SaveJson['item'] = [];
                            }
                            if($(this).find('textarea').val()){
                                SaveJson['item'].push($(this).find('textarea').val());
                            }
                            break;
                        case 'add_cost':
                            saveAction = 'cost';
                            if(!SaveJson['item']){
                                SaveJson['item'] = [];
                                SaveJson['price'] = [];
                            }
                            if($(this).find('input[type="text"]').val()){
                                SaveJson['item'].push($(this).find('input[type="text"]').val());
                                SaveJson['price'].push($(this).find('input[type="number"]').val());
                            }
                            break;
                    }
                });
                if(saveAction){
                    xajax_SaveInfo('{#$SelectStrokeItem.id#}', saveAction, SaveJson);
                }
            }

            function SearchRecord(Search=''){
                if(Search){
                    $('#RecordBlockArea .recordItem').hide();
                    $('#RecordBlockArea .recordItem').each(function(e) {
                        var Name = $(this).attr('data-name');
                        var UID = $(this).attr('data-uid');
                        var dataJson = JSON.parse($(this).attr('data-json'));
                        if(Name.indexOf(Search)!==-1 || UID.indexOf(Search)!==-1 || dataJson['name'].indexOf(Search)!==-1 || dataJson['formatted_address'].indexOf(Search)!==-1 || dataJson['place_id'].indexOf(Search)!==-1){
                            $(this).show();
                        }
                    });
                }else{
                    $('#RecordBlockArea .recordItem').show();
                }
            }
            function SearchList(Search=''){
                if(Search){
                    $('#place_list .placeItem').hide();
                    hideAllMarker();
                    $('#place_list .placeItem').each(function(e) {
                        var Name = $(this).attr('data-name');
                        var UID = $(this).attr('data-uid');
                        var dataJson = JSON.parse($(this).attr('data-json'));
                        if(Name.indexOf(Search)!==-1 || UID.indexOf(Search)!==-1 || dataJson['name'].indexOf(Search)!==-1 || dataJson['formatted_address'].indexOf(Search)!==-1 || dataJson['place_id'].indexOf(Search)!==-1){
                            $(this).show();
                            showMarker(dataJson['place_id']);
                        }
                    });
                }else{
                    $('#place_list .placeItem').show();
                    showAllMarker();
                }
            }
            function ActionChange(obj){
                if(obj.val()==='record'){
                    $('#SearchRecord').show();
                    $('#SearchBlockArea').hide();
                    $('#RecordBlockArea').show();
                    $('#NoteEditArea').hide();
                }else if(obj.val()==='note'){
                    $('#SearchRecord').hide();
                    $('#SearchBlockArea').hide();
                    $('#RecordBlockArea').hide();
                    $('#NoteEditArea').show();
                }else{
                    $('#SearchRecord').hide();
                    $('#SearchBlockArea').show();
                    $('#RecordBlockArea').hide();
                    $('#NoteEditArea').hide();
                }
            }
            function ShowChange(obj){
                if(obj.val()==='map'){
                    $('#MapFrame').removeClass('hide');
                    $('#place_list').hide();
                }else{
                    $('#MapFrame').addClass('hide');
                    $('#place_list').show();
                }
            }

            var MapFrame, markers = [], markerList = [], infowindowList = [];
            function initMap() {
                MapFrame = new google.maps.Map(document.getElementById('MapFrame'), {
                    zoom: 6,
                    center: {
                        lat: 23.690000,
                        lng: 120.885853
                    },
                    disableDefaultUI: true
                });

                {#foreach $GetPlace as $PlaceKey=>$PlaceItem#}
                    addMarker({#json_encode($PlaceItem)#}, 'start');
                {#/foreach#}
            }

            function BuildInfoHtml(act='build', PlaceItem, from) {
                var _userId = '{#$userId#}';
                var _UID = PlaceItem['propertyA'];
                var _OwnerArea = (PlaceItem['owner']) ? '$('+ "'#OwnerArea'" +').hide();' : '$('+ "'#OwnerArea'" +').show();';
                var _Delete = (PlaceItem['owner']) ? '<span class="btn btn-xs btn-danger" onclick="if(confirm('+ "'確定要刪除「"+ PlaceItem['subject']['name'] +"」的店家資訊嗎?'" +')){ xajax_deletePlace('+ "'"+_userId+"'" +', '+ "'"+PlaceItem['propertyB']+"'" +', '+markerList.length + ', '+"'"+PlaceItem['id']+"'" +'); }"><i class="fa fa-fw fa-trash-o"></i></span>' : '';
                var _open_next = (PlaceItem['subject']['open_next']) ? '<div><i class="fa fa-fw fa-clock-o" style="color: #4285f4;"></i> '+ PlaceItem['subject']['open_next'] +'</div>' : '';

                var periodsHtml = '';
                for(var d=0;d<7;d++){
                    if(PlaceItem['subject']['periods']){
                        periodsHtml += '<span class="periods" WeekDay="'+d+'">' + weekdayList[d] + ': ';
                        if(PlaceItem['subject']['periods'][d]){
                            var pCtn = 0;
                            PlaceItem['subject']['periods'][d].forEach(function(period){
                                if(pCtn!==0){
                                    periodsHtml += ', ';
                                }
                                periodsHtml += period['open'].substr(0,2)+':'+period['open'].substr(2,2) + '~' + period['close'].substr(0,2)+':'+period['close'].substr(2,2);
                                pCtn++;
                            });
                        }else{
                            periodsHtml += '休息';
                        }
                    }else{
                        periodsHtml += '<span class="periods" WeekDay="'+d+'">無提供營業時間';
                    }
                    periodsHtml += "</span>";
                }
                var InTripState = (_SelectStrokeList&&_SelectStrokeList.indexOf(PlaceItem['propertyB'])!==-1) ? 'True' : 'False';
                var _RecordInnerHtml = '<p>'+
                                            '<span class="h4">'+ PlaceItem['subject']['name'] +' </span>'+
                                            '<span class="btn btn-xs btn-success AddIn" onclick="AddIn($(this));"><i class="fa fa-fw fa-calendar-plus-o"></i></span>'+
                                            '<span class="InTripState '+ InTripState +'"></span>'+
                                        '</p>'+
                                        '<div><i class="fa fa-fw fa-clock-o" style="color: #4285f4;"></i> '+ periodsHtml +'</div>'+
                                        '<a target="_blank" href="https://www.google.com.tw/maps/dir//'+PlaceItem['subject']['name']+' '+PlaceItem['subject']['formatted_address']+'/@'+PlaceItem['subject']['geometry']['location']['lat']+','+PlaceItem['subject']['geometry']['location']['lng']+',12z"><div><i class="fa fa-fw fa-map-marker" style="color: #4285f4;"></i> '+ PlaceItem['subject']['formatted_address'] +'</div></a>'+
                                        '<hr>';
                var _RecordHtml =   '<div class="recordItem" data-Name="'+ _userList[PlaceItem['propertyA']]['subject']['displayName'] +'" data-UID="'+ PlaceItem['propertyA'] +'" data-placeId="'+ PlaceItem['id'] +'" data-id="'+ PlaceItem['propertyB'] +'" data-json='+ "'"+JSON.stringify(PlaceItem['subject']).replaceAll("'", "")+"'" +'>'+
                                        _RecordInnerHtml+
                                    '</div>';
                var RemarksHtml = (PlaceItem['subject']['Remarks']) ? '<pre class="Remark">'+ PlaceItem['subject']['Remarks'] +'</pre>' : '<div class="Remark"></div>';

                var _InnerHTML = '<p>'+
                                    '<span class="h4">'+ PlaceItem['subject']['name'] +' </span>'+
                                    RemarksHtml+
                                    '<div>'+
                                        PlaceItem['subject']['open_now'] + ' '+
                                        '<span class="btn btn-xs btn-warning" onclick="$('+ "'#Remarks'" +').val($(this).parents('+ "'.placeItem'" +').find('+ "'.Remark'" +').html()).attr('+ "'placeId'" +', '+"'"+PlaceItem['id']+"'"+');$('+ "'#RemarksArea'" +').show();"><i class="fa fa-fw fa-edit"></i></span>'+
                                        '<span class="btn btn-xs btn-info" onclick="'+ _OwnerArea +'$('+ "'#Owner'" +').html('+ "'"+_userList[_UID]['subject']['displayName']+"'" +');$('+ "'#ChooseActionArea'" +').hide();$('+ "'#ShowAction_search'" +').prop('+ "'checked'" +', true);$('+ "'#SearchBlockArea'" +').show();$('+ "'#RecordBlockArea'" +').hide();$('+ "'#SearchArea'" +').hide();$('+ "'#add_place'" +').show();$('+ "'#PlaceResult'" +').html('+ "''" +');xajax_search('+ "'', " + "'', " + "'', " + "'', $(this).parents('.placeItem').attr('data-json')" +');"><i class="fa fa-fw fa-info"></i></span>'+
                                        '<span class="btn btn-xs btn-primary" onclick="if(confirm('+ "'確定要更新「"+ PlaceItem['subject']['name'] +"」店家資訊嗎? (將會扣除API的呼叫額度)'" +')){ xajax_updatePlace('+ "'"+_userId+"'" +', '+ "'"+PlaceItem['propertyB']+"'" + ', '+ "'"+PlaceItem['id']+"'" +'); }"><i class="fa fa-fw fa-refresh"></i></span>'+
                                        _Delete+
                                    '</div>'+
                                '</p>'+
                                _open_next+
                                '<a target="_blank" href="https://www.google.com.tw/maps/dir//'+PlaceItem['subject']['name']+' '+PlaceItem['subject']['formatted_address']+'/@'+PlaceItem['subject']['geometry']['location']['lat']+','+PlaceItem['subject']['geometry']['location']['lng']+',12z"><div><i class="fa fa-fw fa-map-marker" style="color: #4285f4;"></i> '+ PlaceItem['subject']['formatted_address'] +'</div></a>'+
                                '<hr>';
                var _Html = '<div class="placeItem" data-Name="'+ _userList[PlaceItem['propertyA']]['subject']['displayName'] +'" data-UID="'+ PlaceItem['propertyA'] +'" data-id="'+ PlaceItem['propertyB'] +'" data-json='+ "'"+JSON.stringify(PlaceItem['subject']).replaceAll("'", "")+"'" +'>'+
                                _InnerHTML+
                            '</div>';
                if(act==='build'){
                    if(from==='start'){
                        if(!_SelectStrokeList[0] || (_SelectStrokeList&&_SelectStrokeList.indexOf(PlaceItem['propertyB'])!==-1)){
                            $('#place_list').append(_Html);
                        }
                        $('#RecordBlockArea').append(_RecordHtml);
                    }else{
                        $('#place_list').prepend(_Html);
                        $('#RecordBlockArea').prepend(_RecordHtml);
                    }
                    return _Html;
                }else{
                    $('.placeItem[data-UID="'+ PlaceItem['propertyA'] +'"][data-id="'+ PlaceItem['propertyB'] +'"]').attr('data-json', JSON.stringify(PlaceItem['subject']).replaceAll("'", "")).html(_InnerHTML);
                    $('.recordItem[data-UID="'+ PlaceItem['propertyA'] +'"][data-id="'+ PlaceItem['propertyB'] +'"]').attr('data-json', JSON.stringify(PlaceItem['subject']).replaceAll("'", "")).html(_RecordInnerHtml);
                }
            }

            function showAllMarker() {
                for (let i = 0; i < markerList.length; i++) {
                    if(markerList[i] && markers[markerList[i]]){
                        showMarker(markerList[i]);
                    }
                }
            }
            function hideAllMarker() {
                for (let i = 0; i < markerList.length; i++) {
                    if(markerList[i] && markers[markerList[i]]){
                        hideMarker(markerList[i]);
                    }
                }
            }
            function showMarker(placeid) {
                markers[placeid].setMap(MapFrame);
            }
            function hideMarker(placeid) {
                markers[placeid].setMap(null);
            }
            function deleteMarker(Ctn) {
                hideMarker(markerList[Ctn]);
                markerList[Ctn] = null;
            }

            function addMarker(obj, from='') {
                if(obj && !obj['propertyB']){
                    obj = JSON.parse(obj);
                }
                if($('.placeItem[data-UID="'+ obj['propertyA'] +'"][data-id="'+ obj['propertyB'] +'"]').length > 0){
                    BuildInfoHtml('update', obj);
                }else{
                    if(!_SelectStrokeList[0] || (_SelectStrokeList&&_SelectStrokeList.indexOf(obj['propertyB'])!==-1)){
                        if(from!=='start' && $("#SetNotify").attr('data-flag')==='on'){
                            /*SendMsg([{
                                "type" : "flex",
                                "altText": "【"+ $("#displayName").html() +"】在「{#$ProjectName#}」中新增了「"+ obj['subject']['name'] +"」",
                                "contents" : {
                                    "type": "bubble",
                                    "body": {
                                        "type": "box",
                                        "layout": "vertical",
                                        "contents": [
                                            {
                                                "type": "box",
                                                "layout": "horizontal",
                                                "contents": [
                                                    {
                                                        "type": "filler"
                                                    },
                                                    {
                                                        "type": "box",
                                                        "layout": "vertical",
                                                        "contents": [
                                                            {
                                                                "type": "image",
                                                                "url": "https://image.flaticon.com/icons/png/128/2555/2555572.png",
                                                                "aspectMode": "cover",
                                                                "size": "full"
                                                            }
                                                        ],
                                                        "cornerRadius": "150px",
                                                        "width": "100px",
                                                        "height": "100px",
                                                        "flex": 0
                                                    },
                                                    {
                                                        "type": "filler"
                                                    }
                                                ],
                                                "paddingAll": "20px"
                                            },
                                            {
                                                "type": "box",
                                                "layout": "vertical",
                                                "contents": [
                                                    {
                                                        "type": "text",
                                                        "text": "【"+ $("#displayName").html() +"】在「{#$ProjectName#}」中新增了「"+ obj['subject']['name'] +"」",
                                                        "color": "#444444",
                                                        "size": "lg",
                                                        "margin": "md",
                                                        "weight": "bold",
                                                        "align": "center",
                                                        "wrap": true
                                                    }
                                                ],
                                                "paddingAll": "20px",
                                                "paddingTop": "0px"
                                            }
                                        ],
                                        "paddingAll": "0px"
                                    }
                                }
                            }], 0);*/
                            SendMsg([{
                                "type" : "text",
                                "text" : "【"+ $("#displayName").html() +"】在「{#$ProjectName#}」中新增了「"+ obj['subject']['name'] +"」"
                            }], 0);
                        }
                        var infowindow = new google.maps.InfoWindow({
                            content: BuildInfoHtml('build', obj, from)
                        });
                        var PicUrl = obj['subject']['icon'];//'https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/geocode-71.png'、obj['subject']['icon']
                        var marker = new google.maps.Marker({
                            position: {
                                lat: obj['subject']['geometry']['location']['lat'],
                                lng: obj['subject']['geometry']['location']['lng']
                            },
                            map: MapFrame,
                            //label: obj['subject']['name'],
                            icon: {
                                url: PicUrl,
                                scaledSize: new google.maps.Size(22, 22),
                                origin: new google.maps.Point(0, 0),
                                anchor: new google.maps.Point(0, 0)
                            }
                        });

                        markers[obj['propertyB']] = marker;
                        infowindowList[obj['propertyB']] = infowindow;
                        markerList.push(obj['propertyB']);

                        marker.addListener("click", () => {
                            for (let i = 0; i < markerList.length; i++) {
                                if(markerList[i] && infowindowList[markerList[i]]){
                                    infowindowList[markerList[i]].close();
                                }
                            }
                            infowindow.open(MapFrame, marker);
                        });
                    }else{
                        BuildInfoHtml('build', obj, from);
                    }
                }
            }
        </script>
        <script>
            var pressFlag = false;
            $(function () {
                updateTotal();
                var SelectStrokeItem = {#if $SelectStrokeItem.subject.stroke#}{#json_encode($SelectStrokeItem.subject.stroke)#}{#else#}[]{#/if#};
                if(SelectStrokeItem[0]){
                    var DayKey = 0;
                    SelectStrokeItem.forEach(function(Day){
                        AddDay();
                        $('.DayItem[DayCtn="'+ DayKey +'"] .AddTripBtn').click();
                        Day.forEach(function(Item){
                            if(Item.substr(0, 5)==='Note_'){
                                $('#NoteEdit').val(Item.substr(5));
                                $('#NoteEditArea>.AddIn').click();
                            }else{
                                //console.log(Item);
                                $('#RecordBlockArea .recordItem[data-id="'+ Item +'"] .AddIn').eq(0).click();
                            }
                        });
                        DayKey++;
                    });
                    $('#add_place').hide();
                }else{
                    AddDay();
                }

                for(var i=$('#DayList .DayItem').length;i<10;i++){
                    AddDay();
                    $('#DayList .DayItem').eq(i).hide();
                }
                var DragList = [];
                for(var o=0;o<10;o++){
                    DragList.push($('#collapse'+o+' .DayTrip')[0]);
                }
                var TripItemDrake = dragula(DragList, {
                    moves: function(el, container, handle) {
                        return true;
                    }
                });
                TripItemDrake.on('drag', function (element) {
                    if(pressFlag){
                        $('html, body').css('overflow', 'hidden');
                        $('#add_stroke').css('overflow', 'hidden');
                    }else{
                        TripItemDrake.end();
                    }
                }).on('dragend', function (element) {
                    pressFlag = false;
                    $(element).css('cursor', 'grab');
                    $('html, body').css('overflow', 'auto');
                    $('#add_stroke').css('overflow', 'auto');
                }).on('drop', function (element) {
                    var obj = $(element);
                    var _DayItem = obj.parents('.DayItem');
                    NowDayCtn = _DayItem.attr('DayCtn');
                    var ChooseDate = new Date($('#ChooseDate').val());
                    ChooseDate.setDate(ChooseDate.getDate()*1+NowDayCtn*1);
                    var _TripItem = obj;
                    if(_TripItem.attr('data-Json')){
                        var dataJson = JSON.parse(_TripItem.attr('data-Json'));
                        var dataId = _TripItem.attr('data-id');
                        var d = ChooseDate.getDay();

                        var Color='', Text='';
                        if(dataJson['periods']){
                            if(dataJson['periods'][d]){
                                Color = '5cb85c';
                                Text = weekdayList[d] + ': ';
                                var pCtn = 0;
                                dataJson['periods'][d].forEach(function(period){
                                    if(pCtn!==0){
                                        Text += ', ';
                                    }
                                    Text += period['open'].substr(0,2)+':'+period['open'].substr(2,2) + '~' + period['close'].substr(0,2)+':'+period['close'].substr(2,2);
                                    pCtn++;
                                });
                            }else{
                                Color = 'd9534f';
                                Text = weekdayList[d] + ': 休息';
                            }
                        }else{
                            Color = 'ffd02c';
                            Text = '無提供營業時間';
                        }
                        _TripItem.find('span.periods').parent().html('<i class="fa fa-fw fa-clock-o" style="color: #'+ Color +';"></i><span class="periods" WeekDay="'+d+'" style="color: #'+ Color +';">'+ Text +'</span>');
                    }
                });
                var DayItemDrake = dragula([$('#DayList')[0]], {
                    moves: function(el, container, handle) {
                        return (handle.classList.contains('panel-heading')||handle.classList.contains('panel-title')||handle.classList.contains('DayTitle'));
                    }
                });
                DayItemDrake.on('drag', function (element) {
                    if(pressFlag){
                        $('html, body').css('overflow', 'hidden');
                        $('#add_stroke').css('overflow', 'hidden');
                    }else{
                        DayItemDrake.end();
                    }
                }).on('dragend', function (element) {
                    pressFlag = false;
                    $(element).find('.panel-heading').css('cursor', 'grab');
                    $('html, body').css('overflow', 'auto');
                    $('#add_stroke').css('overflow', 'auto');
                }).on('drop', function (element) {
                    ChangeDate();
                });

                $('#SelectStroke option:selected').click().focus().select();
                $(document).on('click', '#SendTripBtn', function(event) {
                    var html = '<select class="form-control" name="swalfields[DayCtn]">';
                    html += '<option value="">請選擇</option>';
                    $('#DayList .DayItem').each(function(e) {
                        if($(this).css('display')!=='none'){
                            html += '<option value="'+ $(this).attr('DayCtn') +'">'+ $(this).find('.DayTitle').html() +'</option>';
                        }
                    });
                    html += '</select>';
                    if($('#SelectStroke').val()){
                        swal({
                            type: 'warning',
                            title: '請選擇要傳送的日期',
                            html: html,
                            cancelButtonText: '取消',
                            showCancelButton: true,
                            confirmButtonText: '確定',
                        }).then(function (dismiss) {
                            var date = $("select[name='swalfields[DayCtn]']").val();
                            if(date){
                                SendTrip(date);
                            }else{
                                alert('日期不得為空');
                                $("#SendTripBtn").click();
                            }
                        }, function (dismiss) {
                            if (dismiss === 'cancel') {
                                console.log('取消');
                            }
                        });
                    }else{
                        SendTrip();
                    }
                });
                function SendTrip(ChooseDayCtn=null){
                    var CategoryObj = $('.CategorySelect').find('.note_block');
                    var SubCategoryObj = $('.SubCategorySelect').find('.note_block');
                    var NoteObj = $('.NoteSelect');
                    var BGColorList = ['#0367D3', '#5cb85c', '#666f86', '#A17DF5', '#3b5998', '#e04f07', '#27ACB2', '#FF6B6E', '#444444', '#5b82db'];
                    var carouselJSON = {
                        "type": "carousel"
                      };
                    var bubbleJSON = {
                        "type": "bubble",
                        "size": "mega",//mega、giga
                        "header": {
                            "type": "box",
                            "layout": "horizontal",//vertical、horizontal
                            "contents": [
                                {
                                    "type": "box",
                                    "layout": "vertical",
                                    "contents": [
                                        {
                                            "type": "text",
                                            "color": "#ffffff66",
                                            "size": "sm",
                                            "contents": [
                                                {
                                                    "type": "span",
                                                    "text": " "
                                                },
                                                {
                                                    "type": "span",
                                                    "text": "2020/12/31 週四"
                                                }
                                            ]
                                        },
                                        {
                                            "type": "text",
                                            "color": "#ffffff",
                                            "size": "xl",
                                            "flex": 4,
                                            "weight": "bold",
                                            "wrap": true,
                                            "contents": [
                                                {
                                                    "type": "span",
                                                    "text": " "
                                                },
                                                {
                                                    "type": "span",
                                                    "text": "第1天"
                                                }
                                            ]
                                        }
                                    ]
                                }
                            ],
                            "paddingTop": "22px",
                            "paddingBottom": "20px",
                            "paddingStart": "20px",
                            "paddingEnd": "20px",
                            "backgroundColor": "#0367D3",
                            "spacing": "md"
                        },
                        "body": {
                            "type": "box",
                            "layout": "vertical",
                            "contents": []
                        }
                    };
                    var titleJSON = {
                        "type": "box",
                        "layout": "horizontal",
                        "contents": [
                            {
                                "type": "box",
                                "layout": "vertical",
                                "contents": [
                                    {
                                        "type": "filler"
                                    },
                                    {
                                        "type": "box",
                                        "layout": "vertical",
                                        "contents": [],
                                        "cornerRadius": "30px",
                                        "height": "12px",
                                        "width": "12px",
                                        "borderColor": "#ffd02c",
                                        "borderWidth": "2px"
                                    },
                                    {
                                        "type": "filler"
                                    }
                                ],
                                "flex": 0
                            },
                            {
                                "type": "text",
                                "text": "彥彥工作室－Yen Yen",
                                "gravity": "center",
                                "flex": 4,
                                "size": "sm"
                            }
                        ],
                        "spacing": "lg",
                        "cornerRadius": "30px"
                    };
                    var detailJSON = {
                        "type": "box",
                        "layout": "horizontal",
                        "contents": [
                            {
                                "type": "box",
                                "layout": "vertical",
                                "contents": [
                                    {
                                        "type": "box",
                                        "layout": "horizontal",
                                        "contents": [
                                            {
                                                "type": "filler"
                                            },
                                            {
                                                "type": "box",
                                                "layout": "vertical",
                                                "contents": [],
                                                "width": "2px",
                                                "backgroundColor": "#B7B7B7"
                                            },
                                            {
                                                "type": "filler"
                                            }
                                        ],
                                        "flex": 1
                                    }
                                ],
                                "width": "12px"
                            },
                            {
                                "type": "box",
                                "layout": "vertical",
                                "contents": [
                                    {
                                        "type": "box",
                                        "layout": "vertical",
                                        "contents": [
                                            {
                                                "type": "text",
                                                "text": "休息",
                                                "gravity": "center",
                                                "flex": 4,
                                                "size": "xs",
                                                "color": "#8c8c8c",
                                                "wrap": true
                                            }
                                        ]
                                    }
                                ],
                                "flex": 1,
                                "paddingTop": "8px",
                                "paddingBottom": "8px"
                            }
                        ],
                        "spacing": "lg"
                    };
                    var bodyJSON = {
                        "type": "box",
                        "layout": "vertical",
                        "contents": [],
                        "action": {
                            "type": "uri",
                            "uri": "http://linecorp.com/"
                        }
                    };
                    var EndPointJSON = JSON.parse(JSON.stringify(titleJSON));
                    EndPointJSON['contents'][0]['contents'][1]['borderColor'] = '#B7B7B7';
                    EndPointJSON['contents'][0]['contents'][1]['backgroundColor'] = '#B7B7B7';
                    EndPointJSON['contents'][1]['text'] = ' ';

                    var carouselContent = [];
                    if($('#SelectStroke').val()){
                        $('#collapse'+ChooseDayCtn+' .DayTrip>.TripItem').each(function(e) {
                            PushContent($(this), 'TripItem');
                        });
                    }else{
                        $('#place_list .placeItem').each(function(e) {
                            if($(this).css('display') !== 'none'){
                                PushContent($(this), 'placeItem');
                            }
                        });
                    }

                    function PushContent(obj=null, objClass=''){
                        var _placeId = obj.attr('data-id');
                        if(_placeId !== 'Note'){
                            var _dataJson = JSON.parse($('#place_list .placeItem[data-id="'+_placeId+'"]').attr('data-json'));
                        }
                        var NowDate=new Date(), _DayCtn, NextDate, TitleText, RealTimeText, DateText, DateTextFront, ChooseDate, Time;
                        if(objClass==='TripItem'){
                            _DayCtn = obj.parents('.DayItem').attr('DayCtn');
                            ChooseDate = new Date($('#ChooseDate').val());ChooseDate.setDate(ChooseDate.getDate()*1+_DayCtn*1);
                            NextDate = new Date($('#ChooseDate').val());NextDate.setDate(NextDate.getDate()*1+_DayCtn*1+1);
                            DateText = '';
                            DateTextFront = '第'+(_DayCtn*1+1)+'天 ';
                            RealTimeText = ( (NowDate.getFullYear()+'/'+NowDate.getMonth()+'/'+NowDate.getDate()) === (ChooseDate.getFullYear()+'/'+ChooseDate.getMonth()+'/'+ChooseDate.getDate()) ) ? '(即時)' : '';
                            TitleText = $('#TripName').val();
                            Time = ( (NowDate.getFullYear()+'/'+NowDate.getMonth()+'/'+NowDate.getDate()) === (ChooseDate.getFullYear()+'/'+ChooseDate.getMonth()+'/'+ChooseDate.getDate()) ) ? ' ' + NowDate.getHours()+':'+NowDate.getMinutes()+':'+NowDate.getSeconds() : '';
                        }else if(objClass==='placeItem'){
                            _DayCtn = carouselContent.length;
                            ChooseDate = new Date();
                            NextDate = new Date();NextDate.setDate(NextDate.getDate()*1+1*1);
                            DateText = '';
                            DateTextFront = '';
                            RealTimeText = '(即時)';
                            TitleText = '第'+(_DayCtn*1+1)+'頁';
                            Time = ' ' + NowDate.getHours()+':'+NowDate.getMinutes()+':'+NowDate.getSeconds();
                        }

                        DateText = ChooseDate.getFullYear()+'/'+(ChooseDate.getMonth()*1+1)+'/'+ChooseDate.getDate()+' 週'+weekdayList[ChooseDate.getDay()] + Time;
                        var ThisDayTrip = JSON.parse(JSON.stringify(bubbleJSON));
                        if(DateTextFront){
                            ThisDayTrip['header']['contents'][0]['contents'][0]['contents'][0]['text'] = DateTextFront;
                            ThisDayTrip['header']['contents'][0]['contents'][0]['contents'][0]['size'] = 'lg';
                            ThisDayTrip['header']['contents'][0]['contents'][0]['contents'][0]['color'] = '#ffffff9f';
                            ThisDayTrip['header']['contents'][0]['contents'][0]['contents'][0]['weight'] = 'bold';
                        }
                        ThisDayTrip['header']['contents'][0]['contents'][0]['contents'][1]['text'] = DateText;
                        if(RealTimeText){
                            ThisDayTrip['header']['contents'][0]['contents'][1]['contents'][0]['text'] = RealTimeText;
                            ThisDayTrip['header']['contents'][0]['contents'][1]['contents'][0]['size'] = 'sm';
                            ThisDayTrip['header']['contents'][0]['contents'][1]['contents'][0]['color'] = '#ffffff66';
                            ThisDayTrip['header']['contents'][0]['contents'][1]['contents'][0]['weight'] = 'regular';
                        }
                        ThisDayTrip['header']['contents'][0]['contents'][1]['contents'][1]['text'] = TitleText;
                        ThisDayTrip['header']['backgroundColor'] = BGColorList[_DayCtn];

                        var ThisPlaceTitle = JSON.parse(JSON.stringify(titleJSON));
                        var ThisPlaceDetail = JSON.parse(JSON.stringify(detailJSON));
                        var ThisPlaceBody = JSON.parse(JSON.stringify(bodyJSON));

                        if(_placeId === 'Note'){
                            if(obj.find('.ItemContent>pre').html()){
                                if(!ThisDayTrip['body']['contents'] || ThisDayTrip['body']['contents'].length===0){
                                    ThisDayTrip['body']['contents'].push(EndPointJSON);
                                }
                                ThisPlaceDetail['contents'][1]['contents'][0]['contents'][0]['color'] = '#8a6d3b';
                                ThisPlaceDetail['contents'][1]['contents'][0]['contents'][0]['text'] = obj.find('.ItemContent>pre').html();
                                delete ThisPlaceDetail['contents'][1]['paddingTop'];
                                ThisPlaceDetail['contents'][1]['contents'][0]['paddingAll'] = '8px';
                                ThisPlaceDetail['contents'][1]['contents'][0]['borderWidth'] = '1px';
                                ThisPlaceDetail['contents'][1]['contents'][0]['borderColor'] = '#EEDBB5';
                                ThisPlaceDetail['contents'][1]['contents'][0]['cornerRadius'] = '8px';
                                ThisPlaceBody['contents'].push(ThisPlaceDetail);
                                delete ThisPlaceBody['action'];
                                ThisDayTrip['body']['contents'].push(ThisPlaceBody);
                            }
                        }else{
                            var Remarks = (_dataJson['Remarks']) ? ' ('+_dataJson['Remarks']+')' : '';
                            ThisPlaceTitle['contents'][1]['text'] = _dataJson['name'] + Remarks;

                            var periodsText = '';
                            var periodsContents = [];
                            var periodsColor = '#8c8c8c';
                            var periodsBorderColor = '#8c8c8c';
                            if(!_dataJson['periods']){
                                periodsText = '無提供營業時間';
                                periodsBorderColor = periodsColor = '#ffd02c';
                            }else if(!_dataJson['periods'][ChooseDate.getDay()]){
                                periodsText = '休息';
                                periodsBorderColor = periodsColor = '#EF454D';
                            }else{
                                var pCtn = 0;
                                _dataJson['periods'][ChooseDate.getDay()].forEach(function(period){
                                    var NowTime = NowDate.getFullYear().toString() + NowDate.getMonth().toString() + NowDate.getDate().toString() + NowDate.getHours().toString() + NowDate.getMinutes().toString() + NowDate.getSeconds().toString();
                                    var OpenTime  = ChooseDate.getFullYear().toString() + ChooseDate.getMonth().toString() + ChooseDate.getDate().toString() + period['open'];
                                    var CloseTime = ChooseDate.getFullYear().toString() + ChooseDate.getMonth().toString();
                                    if(period['open'].substr(0,2)*1>12 &&period['close'].substr(0,2)*1<12){
                                        CloseTime += NextDate.getDate().toString() + period['close'];
                                    }else{
                                        CloseTime += ChooseDate.getDate().toString() + period['close'];
                                    }
                                    periodsText = period['open'].substr(0,2)+':'+period['open'].substr(2,2) + '~' + period['close'].substr(0,2)+':'+period['close'].substr(2,2);
                                    pCtn++;
                                    if(pCtn!==_dataJson['periods'][ChooseDate.getDay()].length){
                                        periodsText += "\n";
                                    }

                                    if( NowTime.substr(0,8)!==OpenTime.substr(0,8) || OpenTime<=NowTime&&NowTime<=CloseTime ){
                                        periodsBorderColor = periodsColor = '#5cb85c';
                                    }else{
                                        periodsColor = '#8c8c8c';
                                    }

                                    periodsContents.push({
                                        "type": "span",
                                        "text": periodsText,
                                        "size": "xs",
                                        "color": periodsColor
                                    });
                                });
                                periodsText = '';
                            }
                            ThisPlaceTitle['contents'][0]['contents'][1]['borderColor'] = periodsColor;
                            if(periodsContents[0]){
                                ThisPlaceDetail['contents'][1]['contents'][0]['contents'][0]['contents'] = periodsContents;
                                delete ThisPlaceDetail['contents'][1]['contents'][0]['contents'][0]['text'];
                            }else if(periodsText){
                                ThisPlaceDetail['contents'][1]['contents'][0]['contents'][0]['color'] = periodsColor;
                                ThisPlaceDetail['contents'][1]['contents'][0]['contents'][0]['text'] = periodsText;
                            }

                            ThisPlaceBody['contents'].push(ThisPlaceTitle);
                            ThisPlaceBody['contents'].push(ThisPlaceDetail);
                            ThisPlaceBody['action']['uri'] = 'https://www.google.com.tw/maps/dir//'+encodeURI(_dataJson['name']+' '+_dataJson['formatted_address'])+encodeURI('/@'+_dataJson['geometry']['location']['lat']+','+_dataJson['geometry']['location']['lng']+',12z');
                            if(!$('#SelectStroke').val()){ delete ThisPlaceBody['action']; }
                            ThisDayTrip['body']['contents'].push(ThisPlaceBody);
                        }
                        var MaxCarouselLen = (objClass==='TripItem') ? 1 : 10;
                        if(carouselContent.length <= MaxCarouselLen){
                            if(objClass==='TripItem'){
                                var TripItem = $('#collapse'+_DayCtn+' .DayTrip>.TripItem');
                                if(TripItem.index(obj)===0){
                                    if(TripItem.index(obj)===(TripItem.length-1)){
                                        ThisDayTrip['body']['contents'].push(EndPointJSON);
                                    }
                                    carouselContent.push(ThisDayTrip);
                                }else{
                                    carouselContent[carouselContent.length-1]['body']['contents'].push(ThisPlaceBody);
                                    if(TripItem.index(obj)===(TripItem.length-1)){
                                        carouselContent[carouselContent.length-1]['body']['contents'].push(EndPointJSON);
                                    }
                                }
                            }else if(objClass==='placeItem'){
                                var MaxItemLen = 3;
                                var placeItem = $('#place_list .placeItem');
                                if(carouselContent[carouselContent.length-1] && carouselContent[carouselContent.length-1]['body']['contents'].length<(MaxItemLen+1)){
                                    carouselContent[carouselContent.length-1]['body']['contents'].push(ThisPlaceBody);
                                    if( carouselContent[carouselContent.length-1]['body']['contents'].length===MaxItemLen || (placeItem.index(obj)===placeItem.length-1) ){
                                        carouselContent[carouselContent.length-1]['body']['contents'].push(EndPointJSON);
                                    }
                                }else{
                                    if(placeItem.index(obj)===(placeItem.length-1)){
                                        ThisDayTrip['body']['contents'].push(EndPointJSON);
                                    }
                                    carouselContent.push(ThisDayTrip);
                                }
                            }
                        }
                    }

                    if(carouselContent.length > 0){
                        if(carouselContent.length === 11){
                            delete carouselContent[10];
                            carouselContent = carouselContent.filter(Boolean);
                        }else if($('#SelectStroke').val() && carouselContent.length === 2){
                            delete carouselContent[1];
                            carouselContent = carouselContent.filter(Boolean);
                        }
                        if($('#SelectStroke').val() && carouselContent.length === 1){
                            carouselContent[0]['size'] = 'giga';
                            var MsgJSON = carouselContent[0];
                        }else{
                            var MsgJSON = JSON.parse(JSON.stringify(carouselJSON));
                            MsgJSON['contents'] = carouselContent;
                        }
                        var AltText = $('#SelectStroke').val() ? '行程 - '+$('#TripName').val() : '店家 - 即時';
                        var actionList = [
                            {
                                "text" : "查看行程",
                                "backgroundColor" : "#f15e5e",
                                "EditArea" : "add_stroke"
                            },
                            {
                                "text" : "消費記帳",
                                "backgroundColor" : "#c77551",
                                "EditArea" : "add_cost"
                            },
                            {
                                "text" : "行程筆記",
                                "backgroundColor" : "#56429a",
                                "EditArea" : "add_note"
                            },
                            {
                                "text" : "待辦事項",
                                "backgroundColor" : "#60c751",
                                "EditArea" : "add_todo"
                            }
                        ];
                        var actionContents = [];
                        for (const [actionKey, actionItem] of Object.entries(actionList)) {
                            actionContents.push({
                                "type": "box",
                                "layout": "vertical",
                                "contents": [
                                    {
                                        "type": "text",
                                        "text": actionItem['text'],
                                        "align": "center",
                                        "color": "#ffffff",
                                        "weight": "bold",
                                        "size": "xxs"
                                    }
                                ],
                                "paddingAll": "10px",
                                "backgroundColor": actionItem['backgroundColor'],
                                "cornerRadius": "lg",
                                "justifyContent": "center",
                                "action": {
                                    "type": "uri",
                                    "uri": "https://liff.line.me/{#$liffId#}/page/place/stroke/{#$SelectStroke#}/EditArea/"+actionItem['EditArea']+"/?project={#$ProjectName#}"
                                }
                            });
                        }
                        var ActionJSON = {
                            "type": "bubble",
                            "size": "giga",
                            "body": {
                                "type": "box",
                                "layout": "vertical",
                                "spacing": "xs",
                                "paddingAll": "10px",
                                "paddingTop": "5px",
                                "paddingBottom": "5px",
                                "contents": [
                                    {
                                        "type": "box",
                                        "layout": "vertical",
                                        "contents": [
                                            {
                                                "type": "text",
                                                "text": "{#$ProjectName#} - "+$('#TripName').val(),
                                                "weight": "bold",
                                                "align": "center",
                                                "size": "lg"
                                            }
                                        ]
                                    },
                                    {
                                        "type": "box",
                                        "layout": "horizontal",
                                        "spacing": "md",
                                        "contents": actionContents
                                    }
                                ]
                            }
                        };
                        var Msg = [
                            {
                                "type": "flex",
                                "altText": AltText,
                                "contents": MsgJSON
                            },
                            {
                                "type": "flex",
                                "altText": AltText,
                                "contents": ActionJSON
                            },
                        ];
                        console.log(JSON.stringify(MsgJSON));
                        console.log(JSON.stringify(ActionJSON));
                        swal({
                            type: 'warning',
                            title: '請選擇',
                            cancelButtonText: '分享',
                            showCancelButton: true,
                            text: '',
                            confirmButtonText: '直接傳送'})
                        .then(function () {
                            SendMsg(Msg, 1);
                        }, function (dismiss) {
                            if (dismiss === 'cancel') {
                                ShareMsg(Msg, 1);
                            }
                        });
                    }else{
                        alert("請選擇要傳送的行程");
                    }
                }
                {#if $EditArea#}
                    $('.EditArea').hide();
                    $('#{#$EditArea#}').show();
                    scrollToLast('{#$EditArea#}');
                {#/if#}
            });
            function AddPress(obj){
                var hammer = new Hammer(obj);
                hammer.on('press', function (ev) {
                    pressFlag = true;
                    $(obj).css('cursor', 'grabbing');
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDy46gRmbARQkLnXcez_2q9lgZ0UpRftG8&callback=initMap" async="" defer=""></script>

        {#include file=$__PublicView|cat:'footer.tpl'#}
        <script>
            var DefaultSubcategory = $("#DefaultSubcategory").html();
            var category_list = {#json_encode($category_list)#};
            var subcategory_list = {#json_encode($subcategory_list)#};
            var note_list = {#json_encode($note_list)#};

            function RemoveManager(obj){
                var userId = $("#userId").html();
                var name = obj.find('.name').html();
                var id = obj.attr('NO');
                if (confirm("確定要移除【" + name +"】一起編輯的權限嗎?") === true) {
                    xajax_AddFlex('place', userId, '', '', '', '', id, '', '', '', 'user');
                }
            }

            function ShareNote(){
                var userId = $("#userId").html();
                var displayName = $("#displayName").html();
                var pictureUrl = $("#pictureUrl").html();
                var statusMessage = $("#statusMessage").html();

                var Msg = '【' + displayName + '】邀請你一起編輯行程規劃';//一起編輯module
                location.href = 'line://msg/text/?' + Msg + '{#$__CustomStickers_Web#}/ft/sharenote?module=place&admin=' + userId;//module=xxx
            }
            function scrollToLast(id){
                if($('#'+id+'>.EditBody>div').eq(-1)[0]){
                    $('#'+id+'>.EditBody>div').eq(-1)[0].scrollIntoView();
                    $('#'+id+'>.EditBody>div').eq(-1).find('input[type="text"]').focus();
                    $('#'+id+'>.EditBody>div').eq(-1).find('textarea').focus();
                }
            }
        </script>
    </body>
</html>