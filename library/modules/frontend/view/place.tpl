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
                font-size: 25px;
                display: flex;
                margin-top: -10px;
                padding: 5px 15px;
                position: absolute;
                width: 100%;
                z-index: 2;
                color: #fff;
                align-items: baseline;
                gap: 8px;
            }
            .EditHeader i {
                color: #fff;
            }
            .EditHeader>.group-item {
                flex: 1;
                text-align: center;
            }
            .EditHeader>.group-item>.content {
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: x-small;
            }
            .bottomBtnArea {
                position: absolute;
                bottom: 5px;
                font-size: 20px;
                transform: translateX(-50%);
                color: #f58e31;
                display: inline-flex;
                align-items: center;
                gap: 10px;
            }
            .bottomBtnArea>.addBtn {
                font-size: 50px;
            }

            #addarea>#add_todo, #addarea>#add_note, #addarea>#add_cost {
                background-color: #e6e6e6;
                overflow: hidden;
            }
            .EditBody {
                overflow: auto;
                height: -webkit-fill-available;
                text-align: left;
                padding-top: 35px;
                z-index: 1;
            }
            #add_cost>.EditBody {
                display: flex;
                flex-direction: column;
            }
            #add_cost>.costView  {
                overflow: auto;
                height: -webkit-fill-available;
                margin-top: 25px;
                padding-top: 35px;
            }
            .form-checkbox[type=checkbox] {
                position: relative;
                visibility: hidden;
            }
            .form-checkbox[type=checkbox]:after {
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
            }
            .form-checkbox.square[type=checkbox]:after {
                content: " ";
                background-color: #d7dcde;
                color: #fff;
                border-radius: 5px;
            }
            .form-checkbox.circle[type=checkbox]:after {
                content: "✓";
                color: #d7dcde;
                border-radius: 50%;
                border: 1px solid;
            }
            .form-checkbox.fontAwesome[type=checkbox]:after {
                color: #bfbfbf;
                font-size: large;
                font-family: 'FontAwesome';
                content: attr(data-content);
            }
            .form-checkbox.square[type=checkbox]:checked:after {
                content: "✓";
                background-color: #f58e31;
            }
            .form-checkbox.fontAwesome[type=checkbox]:checked:after,
            .form-checkbox.circle[type=checkbox]:checked:after {
                color: #f58e31;
            }
            .editCostArea {
                display: none;
                overflow: auto;
                height: -webkit-fill-available;
                text-align: left;
                margin-top: 40px;
                padding-top: 10px;
                z-index: 1;
            }
            .editCostArea input[type=text],
            .editCostArea input[type=number] {
                display: inline-block;
                width: 100%;
            }
            .form-floating:has(input[type^="date"].form-control),
            .form-floating:has(input[type^="datetime-local"].form-control) {
                display: flex;
            }
            .form-floating>input[type^="date"].form-control,
            .form-floating>input[type^="datetime-local"].form-control {
                flex: 1;
            }
            .mb-3 {
                margin-bottom: 1rem !important;
            }
            .button.active {
                color: #f58e31;
                background-color: #fff;
            }
            label>input[type=radio] {
                display: none;
            }

            .inline-form-group {
                display: inline-flex;
                width: 100%;
                margin-bottom: 1rem;
            }
            .inline-form-group>.group-icon {
                padding: 6px 12px;
                color: #555;
                background-color: #eee;
                font-size: 14px;
                text-align: center;
                font-weight: 400;
            }
            .inline-form-group>.group-icon.light {
                background-color: #f58e31;
                color: #fff;
            }
            .inline-form-group>.group-item {
                flex: 1;
            }
            .inline-form-group>.btn {
                margin: 0px 3px;
            }
            .inline-form-group>.btn-success,
            .inline-form-group>.btn-success:hover {
                background-color: #f58e31;
                color: #fff;
                border-color: #f58e31;
            }

            .form-floating {
                position: relative;
            }
            .form-floating>.form-control:focus,
            .form-floating>.form-control:not(:placeholder-shown) {
                padding-top: 1.625rem;
                padding-bottom: .625rem;
            }
            .form-floating>.form-control {
                padding: 1rem .75rem;
            }
            .form-floating>.form-control,
            .form-floating>.form-select {
                height: calc(3.5rem + 2px);
                line-height: 1.25;
            }
            .form-floating>.form-control:focus~label,
            .form-floating>.form-control:not(:placeholder-shown)~label,
            .form-floating>.form-select~label {
                opacity: .65;
                transform: scale(.85) translateY(-.5rem) translateX(.15rem);
                width: auto;
                background-color: transparent;
            }
            .form-floating>label {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                padding: 1rem .75rem;
                pointer-events: none;
                border: 1px solid transparent;
                transform-origin: 0 0;
                transition: opacity .1s ease-in-out, transform .1s ease-in-out;
                width: 100%;
                background-color: #fff;
            }
            
            .editItem-container:not(.costItem) {
                display: flex;
                padding: 8px 16px;
                background-color: #f9f9f9;
                margin: 8px 0;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                align-items: center;
                justify-content: space-between;
            }
            .editItem-container>.description-container {
                flex: 9;
                display: flex;
                flex-direction: column;
                text-align: left;
            }
            .editItem-container>.actions {
                flex: 1;
                display: flex;
                justify-content: space-around;
                gap: 8px;
                margin-left: 10px;
            }
            .editItem-container>.actions>i {
                font-size: 20px;
                color: #f58e31;
                cursor: pointer;
                transition: color 0.3s;
            }
            .editItem-container .description-container>textarea {
                border: none;
                resize: none;
            }

            .editItem-container.costItem {
                display: flex;
                flex-direction: column;
                padding: 8px;
                background-color: #fff;
                margin: 6px 0;
                border-radius: 4px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
                width: 100%;
            }
            .repaid>.reduceList {
                padding: 15px;
                gap: 15px;
            }
            .editItem-container>.header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 14px;
            }
            .editItem-container>.header>.title {
                font-size: 16px;
                font-weight: bold;
                color: #333;
            }
            .editItem-container>.header>.content {
                color: #666;
                display: flex;
                gap: 2px;
            }
            .editItem-container>.header>.content>.member {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 26px;
                height: 26px;
                border-radius: 50%;
                background-color: #f0f0f0;
                font-size: 12px;
                color: #333;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .editItem-container>.header>.content>.repaid-to {
                color: #f58e31;
            }
            .editItem-container>.header>.content>.member.payer {
                background-color: #f58e31;
                color: #fff;
            }
            .editItem-container>.body {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 4px;
            }
            .editItem-container>.body>.actions {
                display: flex;
                justify-content: flex-end;
                gap: 6px;
                font-size: 14px;
            }
            .editItem-container>.body>.actions i {
                color: #f58e31;
                cursor: pointer;
                transition: color 0.3s;
                font-size: large;
            }
            .editItem-container>.details {
                display: flex;
                justify-content: space-between;
                font-size: 12px;
                color: #666;
                margin: 4px 0;
            }
            
            .vertical-box {
                display: flex;
                flex-direction: column;
            }
            .vertical-box.left {
                align-items: flex-start;
            }
            .vertical-box.right {
                align-items: flex-end;
            }
            .vertical-box>.title {
                font-weight: bold;
                color: #333;
                font-size: 14px;
            }
            .vertical-box>.content {
                color: #666;
                font-size: 12px;
            }

            #costItemShareMembers {
                margin-bottom: 12px;
            }
            .costItem-container {
                display: flex;
            }
            .costItem-container>.left-panel {
                flex: 4;
            }
            .costItem-container>.right-panel {
                flex: 1;
                text-align: center;
                padding: 6px 12px;
            }
            .costItem-container .section-title {
                text-align: center;
                color: #78769d;
                font-size: medium;
            }
            .costItem-container.title>.right-panel>.section-title {
                display: inline-flex;
                align-items: center;
            }
            .repaidTo-group {
                display: inline-flex;
                justify-content: center;
                align-items: center;
                vertical-align: middle;
                flex-direction: column;
            }
            .repaidTo-group>.fa-dollar {
                font-size: xx-small;
                margin-bottom: -6px;
                margin-left: -3px;
            }
            .payer {
                color: #f58e31;
            }
            .costItem-container>.right-panel>.checkbox-container {
                display: flex;
                align-items: center;
                justify-content: space-around;
                gap: 10px;
                padding: 6px 12px;
                margin-bottom: 12px;
            }
            .costItem-container>.right-panel>.checkbox-container input {
                margin: 0;
            }

            .costItem:has(input[name="costViewChart"]),
            .costItem:has(input[name="costViewRepaidTo"]) {
                border: none;
            }
            .costItem:has(input[name="costViewChart"]:checked),
            .costItem:has(input[name="costViewRepaidTo"]:checked) {
                border: 1px solid #f58e31;
            }
        </style>
        <div id="signature-pad" class="signature-pad">
            {#include file=$__PublicView|cat:'project_details.tpl'#}
            <div id="place_add_background" class="press_background">
                <div id="place_add_background_area" class="press_button_area">
                    <div class="press_button AddGroup"  data-target='#add_place'>
                        <i class="fa fa-fw fa-map-marker"></i> 店家
                    </div>
                    <div class="press_button {#if $SelectStroke#}EditGroup{#else#}AddGroup{#/if#}" data-target='#add_stroke'>
                        <svg style="height:12px;width:15px;"
                            aria-hidden="true"
                            focusable="false"
                            data-prefix="fas"
                            data-icon="map-marked-alt"
                            class="svg-inline--fa fa-map-marked-alt fa-w-18"
                            role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"
                            >
                            <path fill="#fff" d="M288 0c-69.59 0-126 56.41-126 126 0 56.26 82.35 158.8 113.9 196.02 6.39 7.54 17.82 7.54 24.2 0C331.65 284.8 414 182.26 414 126 414 56.41 357.59 0 288 0zm0 168c-23.2 0-42-18.8-42-42s18.8-42 42-42 42 18.8 42 42-18.8 42-42 42zM20.12 215.95A32.006 32.006 0 0 0 0 245.66v250.32c0 11.32 11.43 19.06 21.94 14.86L160 448V214.92c-8.84-15.98-16.07-31.54-21.25-46.42L20.12 215.95zM288 359.67c-14.07 0-27.38-6.18-36.51-16.96-19.66-23.2-40.57-49.62-59.49-76.72v182l192 64V266c-18.92 27.09-39.82 53.52-59.49 76.72-9.13 10.77-22.44 16.95-36.51 16.95zm266.06-198.51L416 224v288l139.88-55.95A31.996 31.996 0 0 0 576 426.34V176.02c0-11.32-11.43-19.06-21.94-14.86z"></path>
                        </svg>
                         行程
                    </div>
                    {#if !$SelectStrokeItem || $userId==$SelectStrokeItem.propertyA#}
                        <div class="press_button AddGroup" data-target='#add_manarger'>
                            <i class="fa fa-fw fa-user-plus"></i> 管理者
                        </div>
                    {#/if#}
                    <div class="press_button EditGroup" data-target='#add_todo'>
                        <i class="fa fa-fw  fa-check-circle-o"></i> 待辦
                    </div>
                    <div class="press_button EditGroup" data-target='#add_note'>
                        <i class="fa fa-fw fa-file-text"></i> 筆記
                    </div>
                    <div class="press_button EditGroup" data-target='#add_cost'>
                        <i class="fa fa-fw fa-credit-card"></i> 記帳
                    </div>
                    <div class="press_button">取消</div>
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
                <div id="MapFrame"></div>
                <div id="place_list"></div>
            </div>
            <div class="signature-pad--footer">
                <div id="addarea">
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
                                <div class="swiper-slide" style="display: none;"></div>
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
                        <div class="EditHeader" style="background-color: #60c751;">
                            <i class="fa fa-save saveBtn" onclick="SaveInfo('add_todo');"></i>
                            <span class="group-item">
                                <span>待辦事項列表</span>
                            </span>
                            <i class="fa fa-close closeBtn" onclick="$(this).parent().parent().hide();"></i>
                        </div>
                        <div class="EditBody"></div>
                        <div class="bottomBtnArea">
                            <i class="fa fa-plus-circle addBtn" onclick="AddInfo('add_todo', {});"></i>
                        </div>
                    </div>
                    <div id="add_note" class="EditArea">
                        <div class="EditHeader" style="background-color: #56429a;">
                            <i class="fa fa-save saveBtn" onclick="SaveInfo('add_note');"></i>
                            <span class="group-item">
                                <span>行程筆記</span>
                            </span>
                            <i class="fa fa-close closeBtn" onclick="$(this).parent().parent().hide();"></i>
                        </div>
                        <div class="EditBody"></div>
                        <div class="bottomBtnArea">
                            <i class="fa fa-plus-circle addBtn" onclick="AddInfo('add_note', {});"></i>
                        </div>
                    </div>
                    <div id="add_cost" class="EditArea">
                        <div class="EditHeader" style="background-color: #c77551;">
                            <i class="fa fa-save saveBtn"></i>
                            <a href="/ft/process/ps/exportCostCsv/id/{#$SelectStroke#}" target="_blank">
                                <i class="fa fa-cloud-download exportBtn"></i>
                            </a>
                            <span class="group-item">
                                <span>消費記帳</span>
                                <div class="content">
                                    <span>Total：</span>
                                    <span id="costTotal">0</span>
                                </div>
                            </span>
                            <i class="fa fa-search searchBtn"></i>
                            <i class="fa fa-close closeBtn"></i>
                        </div>
                        <div class="EditBody costView list"></div>
                        <div class="costView chart">
                            <div>各成員總計</div>
                            <div class="list">
                                <div class="editItem-container costItem">
                                    無
                                </div>
                            </div>
                            <div>消費明細</div>
                            <div class="detail">
                                <div class="editItem-container costItem">
                                    無
                                </div>
                            </div>
                        </div>
                        <div class="costView repaid">
                            <div class="reduceList editItem-container costItem"></div>
                            <div>分帳清單</div>
                            <div class="list">
                                <div class="editItem-container costItem">
                                    無
                                </div>
                            </div>
                            <div>分帳明細</div>
                            <div class="detail">
                                <div class="editItem-container costItem">
                                    無
                                </div>
                            </div>
                        </div>
                        <div class="bottomBtnArea">
                            <i class="fa fa-plus-circle addBtn" onclick="toggleEditCostArea('view', 'list', true);"></i>
                            <i class="fa fa-th-list" onclick="toggleCostView('list');"></i>
                            <i class="fa fa-bar-chart-o" onclick="toggleCostView('chart');"></i>
                            <i class="fa fa-exchange" onclick="toggleCostView('repaid');"></i>
                        </div>
                        <div class="editCostArea">
                            <div class="inline-form-group">
                                <span class="group-icon">
                                    <i class="fa fa-fw fa-tag"></i>
                                </span>
                                <div class="form-floating group-item">
                                    <input type="text" class="form-control" id="costItemDescription" placeholder="例：住宿費">
                                    <label for="costItemDescription">品項</label>
                                </div>
                            </div>
                            <div class="inline-form-group">
                                <span class="group-icon">
                                    <i class="fa fa-fw fa-dollar"></i>
                                </span>
                                <div class="form-floating group-item">
                                    <input type="number" class="form-control" id="costItemPrice" placeholder="例：1000">
                                    <label for="costItemPrice">金額</label>
                                </div>
                            </div>
                            <div class="inline-form-group">
                                <span class="group-icon">
                                    <i class="fa fa-fw fa-file-text-o"></i>
                                </span>
                                <div class="form-floating group-item">
                                    <input type="text" class="form-control" id="costItemNote" placeholder="例：含早餐">
                                    <label for="costItemNote">備註</label>
                                </div>
                            </div>
                            <div class="inline-form-group">
                                <span class="group-icon">
                                    <i class="fa fa-fw fa-map-marker"></i>
                                </span>
                                <div class="form-floating group-item">
                                    <input type="text" class="form-control" id="costItemPlace" placeholder="例：迪士尼">
                                    <label for="costItemPlace">地點</label>
                                </div>
                            </div>
                            <div class="inline-form-group">
                                <span class="group-icon">
                                    <i class="fa fa-fw fa-calendar"></i>
                                </span>
                                <div class="form-floating group-item">
                                    <input type="datetime-local" class="form-control" id="costItemDateTime" placeholder="例：2021-01-01T12:00">
                                    <label for="costItemDateTime">日期時間</label>
                                </div>
                            </div>
                            <hr>
                            <div id="costItemShareType" class="inline-form-group" data-toggle="buttons">
                                <label for="costItemShareTypeWeight" data-type="weight" class="btn btn-success group-item">
                                    權重
                                    <input type="radio" name="costItemShareType" id="costItemShareTypeWeight" value="weight" checked />
                                </label>
                                <label for="costItemShareTypePrice" data-type="price" class="btn btn-default group-item">
                                    金額
                                    <input type="radio"  name="costItemShareType" id="costItemShareTypePrice" value="price" />
                                </label>
                            </div>
                            <div id="costItemShareMembers"></div>
                            <div id="toggleEditMemberAreaBtn" class="button btn-sm" data-mode="show" onclick="toggleEditMemberArea($(this).attr('data-mode'));">
                                <i class="fa fa-users"></i>
                            </div>
                            <div id="editMemberArea" class="mb-3"></div>
                            <div id="createMemberArea" class="inline-form-group">
                                <div class="form-floating group-item">
                                    <input type="text" class="form-control" id="createMemberName" placeholder="請輸入新增成員名稱，例：小明">
                                    <label for="createMemberName">新增成員名稱</label>
                                </div>
                                <span class="group-icon light" onclick="addMember();">
                                    <i class="fa fa-user-plus"></i>
                                </span>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var _userList={#json_encode($userList)#},
                _SelectStrokeList={#json_encode($SelectStrokeList)#},
                DayCtn=0,
                NowDayCtn,
                ChooseWeekDay=new Date().getDay(),
                weekdayList = ['日', '一', '二', '三', '四', '五', '六'];
            let members = {#($members) ? json_encode($members) : '{}'#};
            const todoItem = {#($SelectStrokeItem.subject.todo.item) ? json_encode($SelectStrokeItem.subject.todo.item) : '[]'#};
            const todoChecked = {#($SelectStrokeItem.subject.todo.checked) ? json_encode($SelectStrokeItem.subject.todo.checked) : '[]'#};
            const noteItem = {#($SelectStrokeItem.subject.note.item) ? json_encode($SelectStrokeItem.subject.note.item) : '[]'#};
            const costData = {#($SelectStrokeItem.subject.cost) ? json_encode($SelectStrokeItem.subject.cost) : '{}'#};
            function loadData(){
                for(const [key, data] of Object.entries(todoItem)){
                    AddInfo('add_todo', {
                        item: data,
                        checked: todoChecked[key] ? 'checked' : ''
                    });
                }
                for(const [key, data] of Object.entries(noteItem)){
                    AddInfo('add_note', {
                        item: data
                    });
                }
                for(const [key, costItem] of Object.entries(costData)){
                    createCostItem(costItem);
                }
            }
            function delEditItemContainer(obj){
                const editItemContainer = obj.parents('.editItem-container');
                const title             = editItemContainer.attr('title');
                const checkInput        = editItemContainer.find('.checkInput');
                if(
                    (checkInput.length>0 && !checkInput.val()) ||
                    confirm(`確定要刪除此「${title}」嗎?`)===true
                ){
                    editItemContainer.remove();
                }
            }
            function toggleEditMember(obj){
                const memberId = obj.data('id');
                obj.replaceWith(`
                <div class="form-floating mb-3">
                    <input type="text"
                    class="form-control"
                    id="editMemberName_${memberId}"
                    data-id="${memberId}"
                    value="${members[memberId]}"
                    onchange="editMember($(this));"
                >
                    <label for="editMemberName_${memberId}">編輯成員名稱</label>
                </div>
                `);
            }
            function addMember(){
                const memberId = new Date().getTime();
                const memberName = $('#createMemberName').val();
                if(!memberName){
                    return alert('請填寫成員名稱');
                }
                if(Object.values(members).indexOf(memberName)>-1){
                    return alert('成員名稱重複');
                }
                members[memberId] = memberName;
                updateMemebers();
                $('#createMemberName').val('');
            }
            function editMember(obj){
                const memberId      = obj.data('id');
                const newMemberName = obj.val();
                const oldMemberName = members[memberId];
                if(!newMemberName){
                    return alert('請填寫成員名稱');
                }
                if(Object.values(members).indexOf(newMemberName)>-1){
                    obj.val(oldMemberName);
                    return alert('成員名稱重複');
                }
                members[memberId] = newMemberName;
                updateMemebers();
            }
            function updateMemebers(){
                $('#editMemberArea').html('');
                Object.keys(members).forEach(function(memberId){
                    $('#editMemberArea').append(`
                        <div class="inline-form-group" data-id="${memberId}">
                            <span class="form-control" disabled>${members[memberId]}</span>
                            <span class="group-icon" onclick="toggleEditMember($(this).parent());">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    `);
                });
                $('[name="costItemShareType"]:checked').click().change();
            }
            function toggleCostView(area, editCost=false){
                if(area==='list' && !editCost){
                    $('#add_cost>.EditHeader .exportBtn').css('visibility', 'visible');
                    $('#add_cost>.EditHeader>.searchBtn').css('visibility', 'visible');
                }else{
                    $('#add_cost>.EditHeader .exportBtn').css('visibility', 'hidden');
                    $('#add_cost>.EditHeader>.searchBtn').css('visibility', 'hidden');
                }
                const costViewList = $('#add_cost>.costView.list');
                const costViewChart = $('#add_cost>.costView.chart');
                const costViewRepaid = $('#add_cost>.costView.repaid');
                const bottomBtnArea = $('#add_cost>.bottomBtnArea');
                const addBtn = bottomBtnArea.find('.addBtn');
                const listBtn = bottomBtnArea.find('.fa-th-list');
                const chartBtn = bottomBtnArea.find('.fa-bar-chart-o');
                const repaidBtn = bottomBtnArea.find('.fa-exchange');
                $('#add_cost>.costView').hide();
                bottomBtnArea.find('i').show();
                addBtn.css('order', 1);
                if(area === 'list'){
                    costViewList.show();
                    listBtn.hide();
                    chartBtn.css('order', 0);
                    repaidBtn.css('order', 2);
                }else if(area === 'chart'){
                    processCostViewChart();
                    costViewChart.show();
                    chartBtn.hide();
                    listBtn.css('order', 0);
                    repaidBtn.css('order', 2);
                }else if(area === 'repaid'){
                    processCostViewRepaid();
                    costViewRepaid.show();
                    repaidBtn.hide();
                    listBtn.css('order', 0);
                    chartBtn.css('order', 2);
                }
            }
            function toggleEditCostArea(mode, area='', editCost=false){
                const editBody = $('#add_cost>.EditBody'),
                    editCostArea = $('#add_cost>.editCostArea'),
                    bottomBtnArea = $('#add_cost>.bottomBtnArea');
                if(mode === 'view'){
                    toggleCostView('list', editCost);
                    editBody.find('.editItem-container').removeClass('editing');
                    editBody.hide();
                    editCostArea.show();
                    bottomBtnArea.hide();
                    toggleEditMemberArea('hide');
                    resetCostItem();
                    $('#add_cost>.EditHeader>.saveBtn')
                        .removeClass('fa-save')
                        .addClass('fa-check')
                        .attr('onclick', `AddCostItem();toggleCostView('${area}');`);
                    $('#add_cost>.EditHeader>.closeBtn')
                        .attr('onclick', `toggleEditCostArea("hide");toggleCostView('${area}');`);
                }else if(mode === 'hide'){
                    toggleCostView('list');
                    editBody.show();
                    editBody.find('.editItem').removeClass('editing');
                    editCostArea.hide();
                    bottomBtnArea.show();
                    $('#add_cost>.EditHeader>.saveBtn')
                        .removeClass('fa-check')
                        .addClass('fa-save')
                        .attr('onclick', `SaveInfo('add_cost');`);
                    $('#add_cost>.EditHeader>.closeBtn')
                        .attr('onclick', `$('#add_cost').hide();`);
                }
            }
            function processCostViewChart(){
                const costViewChartDetail = $('#add_cost>.costView.chart>.detail');
                const costItems = $('#add_cost>.EditBody>.costItem');
                const users = {
                    0: {
                        total: 0,
                        name: '未分配',
                    },
                };
                costViewChartDetail.html('');
                costItems.each(function(e) {
                    const costItem = $(this).find('.data').text();
                    const data = JSON.parse(costItem);
                    const payerId = data.payer;
                    const total = data.totalPrice * 1;
                    const membersSharePrice = data.membersSharePrice;
                    let costViewChartDetailItem = '';
                    if(membersSharePrice && Object.keys(membersSharePrice).length>0){
                        Object.keys(membersSharePrice).forEach(function(memberId){
                            if(!users[memberId]){
                                users[memberId] = {
                                    total: 0,
                                    name: members[memberId],
                                };
                            }
                            const price = membersSharePrice[memberId];
                            if(price===0){
                                return;
                            }
                            users[memberId]['total'] += price;
                            costViewChartDetailItem += `
                            <div class="header">
                                <span class="content">
                                    <span class="member costViewChartMember ${(memberId==payerId) ? 'payer' : ''}" data-memberId="${memberId}">
                                        ${members[memberId]}
                                    </span>
                                </span>
                                <span class="content">${formatNumber(price)}</span>
                            </div>
                            `;
                        });
                    }else{
                        if(total===0){
                            return;
                        }
                        users[0]['total'] += total;
                        costViewChartDetailItem += `
                        <div class="header">
                            <span class="content">
                                <span class="member costViewChartMember" data-memberId="0">
                                    未分配
                                </span>
                            </span>
                            <span class="content">${formatNumber(total)}</span>
                        </div>
                        `;
                    }
                    if(total===0){
                        return;
                    }
                    const costItemIndex = costItems.index(this);
                    costViewChartDetail.append(`
                    <div class="editItem-container costItem costViewChartItem"
                        onclick="editCost($('#add_cost>.EditBody>.costItem .editBtn').eq(${costItemIndex}), 'view', 'chart');"
                    >
                        <div class="header">
                            <span class="title">${data.description}</span>
                            <span class="title">${formatNumber(total)}</span>
                        </div>
                        ${costViewChartDetailItem}
                    </div>
                    `);
                });
                processCostViewChartList(users);
            }
            function processCostViewChartList(users){
                const costViewChartList = $('#add_cost>.costView.chart>.list');
                const costViewChartChecked = [];
                $('[name="costViewChart"]:checked').each(function(e) {
                    costViewChartChecked.push($(this).val());
                });
                costViewChartList.html('');
                Object.keys(users).forEach(function(memberId){
                    const user = users[memberId];
                    if(user.total===0){
                        return;
                    }
                    const checked = costViewChartChecked.indexOf(memberId) > -1 ? 'checked' : '';
                    costViewChartList.append(`
                    <label class="editItem-container costItem">
                        <div class="header">
                            <span class="content">
                                <span>${user.name}</span>
                            </span>
                            <span class="title">${formatNumber(user.total)}</span>
                        </div>
                        <input type="checkbox"
                            class="hide"
                            name="costViewChart"
                            value="${memberId}"
                            data-memberId="${memberId}"
                            ${checked}
                        >
                    </label>
                    `);
                });
                $('[name="costViewChart"]').change();
            }
            function processCostViewRepaid(){
                const costViewRepaidDetail = $('#add_cost>.costView.repaid>.detail');
                const costItems = $('#add_cost>.EditBody>.costItem');
                const repaidToMembers = {};
                const reduceRepaidToMembers = {};
                costViewRepaidDetail.html('');
                costItems.each(function(e) {
                    const costItemIndex = costItems.index(this);
                    const costItemData = $(this).find('.data').text();
                    const data = JSON.parse(costItemData);
                    const description = data.description;
                    const total = data.totalPrice * 1;
                    const payerId = data.payer;
                    const membersSharePrice = data.membersSharePrice;
                    const repaidMembers = data.repaidMembers;
                    if(!payerId){
                        return;
                    }
                    if(!membersSharePrice || Object.keys(membersSharePrice).length===0){
                        return;
                    }
                    if(!repaidMembers || Object.keys(repaidMembers).length===0){
                        return;
                    }
                    const costItemContainer = $(`
                    <div class="editItem-container costItem costViewRepaidToPayer"
                        onclick="editCost($('#add_cost>.EditBody>.costItem .editBtn').eq(${costItemIndex}), 'view', 'repaid');"
                        data-payerId="${payerId}"
                    >
                        <div class="header">
                            <span class="title">
                                ${description}
                            </span>
                            <span class="content">
                                <span class="member payer">
                                    ${members[payerId]}
                                </span>
                            </span>
                        </div>
                    </div>
                    `);
                    Object.keys(membersSharePrice).forEach(function(memberId){
                        const repaid = repaidMembers[memberId];
                        const sharePrice = membersSharePrice[memberId];
                        if(sharePrice===0 || memberId===payerId){
                            return;
                        }
                        if(!reduceRepaidToMembers[payerId]){
                            reduceRepaidToMembers[payerId] = 0;
                        }
                        if(!reduceRepaidToMembers[memberId]){
                            reduceRepaidToMembers[memberId] = 0;
                        }
                        if(!repaidToMembers[memberId]){
                            repaidToMembers[memberId] = {};
                        }
                        if(!repaidToMembers[memberId][payerId]){
                            repaidToMembers[memberId][payerId] = {
                                total: 0,
                                repaid: 0,
                                paid: 0,
                            };
                        }
                        repaidToMembers[memberId][payerId]['total'] += sharePrice;
                        if(!repaid){
                            reduceRepaidToMembers[payerId] += sharePrice;
                            reduceRepaidToMembers[memberId] -= sharePrice;
                            repaidToMembers[memberId][payerId]['repaid'] += sharePrice;
                        }else{
                            repaidToMembers[memberId][payerId]['paid'] += sharePrice;
                        }
                        costItemContainer.append(`
                        <div class="header">
                            <span class="content">
                                <span class="member costViewRepaidToMember" data-memberId="${memberId}">
                                    ${members[memberId]}
                                </span>
                            </span>
                            <span class="title"
                                style="color:${repaid?'#60c751':'#c77551'};"
                            >
                                ${formatNumber(sharePrice)}
                            </span>
                        </div>
                        `);
                    });
                    costViewRepaidDetail.append(costItemContainer);
                });
                processCostViewRepaidReduceList(reduceRepaidToMembers);
                processCostViewRepaidList(repaidToMembers);
            }
            function processCostViewRepaidReduceList(reduceRepaidToMembers){
                const costViewRepaidReduceList = $('#add_cost>.costView.repaid>.reduceList');
                const debtors = []; // 欠款成員
                const creditors = []; // 付款成員
                // 將成員分為負值和正值
                for (const [memberId, memberAmount] of Object.entries(reduceRepaidToMembers)) {
                    if (memberAmount < 0) {
                        debtors.push({ memberId, amount: -memberAmount });
                    } else if (memberAmount > 0) {
                        creditors.push({ memberId, amount: memberAmount });
                    }
                }
                costViewRepaidReduceList.html(`<h4>未結清帳務(簡化)</h4>`).hide();
                let memberCount = 0;
                // 計算誰要給誰錢
                for (const debtor of debtors) { // 欠款成員
                    let remainingDebt = debtor.amount;
                    for (const creditor of creditors) { // 付款成員
                        if (remainingDebt <= 0) // 剩餘欠款金額(欠款成員)
                            break;
                        const payment = Math.min(remainingDebt, creditor.amount);     
                        if (payment === 0)
                            continue;
                        memberCount += 1;
                        costViewRepaidReduceList.append(`
                        <div class="header">
                            <span class="content">
                                <span class="member">
                                    ${members[debtor.memberId]}
                                </span>
                                <div class="repaidTo-group payer">
                                    <i class="fa fa-fw fa-long-arrow-right"></i>
                                </div>
                                <span class="member payer">
                                    ${members[creditor.memberId]}
                                </span>
                            </span>
                            <span class="title">${formatNumber(payment)}</span>
                        </div>
                        `);
                        remainingDebt -= payment; // 更新剩餘欠款金額(欠款成員)
                        creditor.amount -= payment; // 更新剩餘欠款金額(付款成員)
                    }
                }
                if(memberCount > 0){
                    costViewRepaidReduceList.show();
                }
            }
            function processCostViewRepaidList(repaidToMembers){
                const costViewRepaidList = $('#add_cost>.costView.repaid>.list');
                const costViewRepaidToChecked = [];
                $('[name="costViewRepaidTo"]:checked').each(function(e) {
                    costViewRepaidToChecked.push($(this).val());
                });
                costViewRepaidList.html('');
                Object.keys(repaidToMembers).forEach(function(memberId){
                    const user = repaidToMembers[memberId];
                    Object.keys(user).forEach(function(payerId){
                        const total = user[payerId]['total'];
                        const repaid = user[payerId]['repaid'];
                        const paid = user[payerId]['paid'];
                        const repaidToChecked = costViewRepaidToChecked.indexOf(`${memberId}_${payerId}`)>-1 ? 'checked' : ''
                        costViewRepaidList.append(`
                        <label class="editItem-container costItem">
                            <div class="header">
                                <span class="content">
                                    <span class="member">
                                        ${members[memberId]}
                                    </span>
                                    <div class="repaidTo-group payer">
                                        <i class="fa fa-fw fa-long-arrow-right"></i>
                                    </div>
                                    <span class="member payer">
                                        ${members[payerId]}
                                    </span>
                                </span>
                                <span class="vertical-box right">
                                    <span class="title" style="color:#c77551;">${formatNumber(repaid)}</span>
                                    <span class="content" style="color:#60c751;">${formatNumber(paid)}</span>
                                </span>
                            </div>
                            <input type="checkbox"
                                class="hide"
                                name="costViewRepaidTo"
                                value="${memberId}_${payerId}"
                                data-memberId="${memberId}"
                                data-payerId="${payerId}"
                                ${repaidToChecked}
                            >
                        </label>
                        `);
                    });
                });
                $('[name="costViewRepaidTo"]').change();
            }
            function getLocalDateTime(date='', format = 'yyyy-MM-ddThh:mm'){
                const now = date ? new Date(date) : new Date();
                const year = now.getFullYear();
                const month = String(now.getMonth() + 1).padStart(2, '0');
                const day = String(now.getDate()).padStart(2, '0');
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                let datatime = '';
                if(format === 'yyyy-MM-dd hh:mm'){
                    return `${year}-${month}-${day} ${hours}:${minutes}`;
                }
                return `${year}-${month}-${day}T${hours}:${minutes}`;
            }
            function resetCostItem(){
                $('#costItemDescription').val('');
                $('#costItemPrice').val('');
                $('#costItemNote').val('');
                $('#costItemPlace').val('');
                $('#costItemDateTime').val(getLocalDateTime());
                $('#costItemShareMembers').html('');
                $('#costItemShareTypeWeight').click().change();
                $('[name="costItemPayer"]').prop('checked', false).change();
            }
            function editCost(obj, mode='view', area='list'){
                toggleEditCostArea(mode, area);
                const group = obj.parents('.editItem-container');
                group.addClass('editing');
                const dataJson = group.find('.data').text();
                const data = JSON.parse(dataJson);
                $('#costItemDescription').val(data.description);
                $('#costItemPrice').val(data.totalPrice);
                $('#costItemNote').val(data.note);
                $('#costItemPlace').val(data.place);
                $('#costItemDateTime').val(data.datetime);
                $(`#costItemShareType${data.shareType==='price'?'Price':'Weight'}`).click().change();
                if(data.shareMembers){
                    Object.keys(data.shareMembers).forEach(function(memberId){
                        $(`#costItemShareMember_${memberId}`).val(data.shareMembers[memberId]);
                    });
                }
                if(data.payer){
                    $(`[name="costItemPayer"][value="${data.payer}"]`).prop('checked', true).change();
                }
                if(data.repaidMembers){
                    Object.keys(data.repaidMembers).forEach(function(memberId){
                        $(`[name="costItemRepaidList"][value="${memberId}"]`).prop('checked', true);
                    });
                }
            }
            function AddCostItem(){
                const editingItemContainer = $('.editItem-container.editing'),
                    description = $('#costItemDescription').val(),
                    totalPrice = $('#costItemPrice').val(),
                    note = $('#costItemNote').val(),
                    shareType = $('[name="costItemShareType"]:checked').val(),
                    shareMembers = {},
                    payer = $('[name="costItemPayer"]:checked').val(),
                    repaidMembers = {},
                    place = $('#costItemPlace').val(),
                    datetime = $('#costItemDateTime').val();
                let ErrorMsg = [];
                if(!description){
                    ErrorMsg.push('請填寫品項');
                }
                if(!totalPrice){
                    ErrorMsg.push('請填寫金額');
                }else{
                    totalPrice * 1;
                }
                let shareMembersFlag = true;
                $('#costItemShareMembers>div').each(function(e) {
                    const memberInput = $(this).find('input');
                    const memberId = memberInput.data('id');
                    if(memberInput.length === 0){
                        return;
                    }
                    if(!memberInput.val()){
                        shareMembersFlag = false;
                    }
                    shareMembers[memberId] = memberInput.val();
                });
                if(payer && (Object.keys(shareMembers).length===0 || !shareMembersFlag)){
                    ErrorMsg.push(`請填寫各成員${shareType==='weight'?'權重':'金額'}`);
                }
                if(ErrorMsg.length>0){
                    return alert(ErrorMsg.join('\n'));
                }
                let membersSharePrice = getMembersSharePrice(shareType, totalPrice, shareMembers);
                if(payer){
                    if(!membersSharePrice.status){
                        return alert(membersSharePrice.error);
                    }
                    $('[name="costItemRepaidList"]').each(function(e) {
                        const memberInput = $(this);
                        const memberId = memberInput.val();
                        if(memberInput.length === 0){
                            return;
                        }
                        if(memberInput.prop('checked')){
                            repaidMembers[memberId] = true;
                        }
                    });
                }
                const costItem = {
                    description         : description,
                    totalPrice          : totalPrice,
                    note                : note,
                    place               : place,
                    datetime            : datetime,
                    payer               : payer,
                    shareType           : shareType,
                    shareMembers        : shareMembers || {},
                    membersSharePrice   : membersSharePrice.data || {},
                    repaidMembers       : repaidMembers || {},
                };
                createCostItem(costItem);
                toggleEditCostArea('hide');
                $('#costItemDescription').val('');
                $('#costItemPrice').val('');
                $('#costItemNote').val('');
                $('#costItemShareTypeWeight').click().change();
                $('#costItemShareMembers').html('');
                if(editingItemContainer.length == 0){
                    scrollToLast('add_cost');
                }
            }
            function createCostItem(costItem){
                const details = (costItem.place || costItem.datetime) ? `
                    <div class="details">
                        <span>${costItem.place}</span>
                        <span>${getLocalDateTime(costItem.datetime, 'yyyy-MM-dd hh:mm')}</span>
                    </div>
                ` : '';
                const editingItemContainer = $('.editItem-container.editing');
                const memberView = Object.keys(costItem.shareMembers).reduce((str, memberId) => {
                    str += (costItem.shareMembers[memberId] && costItem.shareMembers[memberId]>0 && memberId!=costItem.payer) ? `<span class="member">${members[memberId]}</span>` : '';
                    return str;
                }, '');
                let payerView = '';
                if(members[costItem.payer]){
                    payerView += memberView ? `<div class="repaidTo-group payer">
                        <i class="fa fa-fw fa-long-arrow-right"></i>
                    </div>` : '';
                    payerView += `
                    <span class="member payer">
                        ${members[costItem.payer]}
                    </span>
                    `;
                }
                const timestamp = (costItem.datetime) ? new Date(costItem.datetime).getTime().toString().slice(0, -4) : '';
                const orderStyle = (timestamp) ? `style="order:${timestamp};"` : '';
                editItemContainer = $(`
                <div class="editItem-container costItem" title="消費記帳" ${orderStyle}>
                    <div class="header">
                        <span class="title">${costItem.description}</span>
                        <span class="content">${memberView + payerView}</span>
                    </div>
                    <div class="body">
                        <div class="vertical-box left">
                            <span class="title totalPrice" data-price="${costItem.totalPrice}">${costItem.totalPrice ? formatNumber(costItem.totalPrice) : ''}</span>
                            <span class="content">${costItem.note}</span>
                        </div>
                        <div class="actions">
                            <i class="fa fa-edit editBtn" onclick="editCost($(this));"></i>
                            <i class="fa fa-trash" onclick="delEditItemContainer($(this));"></i>
                        </div>
                    </div>
                    ${details}
                    <span class="hide data">${JSON.stringify(costItem)}</span>
                </div>
                `);
                if(editingItemContainer.length > 0){
                    editingItemContainer.replaceWith(editItemContainer);
                }else{
                    $('#add_cost>.EditBody').append(editItemContainer);
                }
                setTimeout(() => {
                    editItemContainer[0].scrollIntoView({behavior: 'smooth', block: 'end'});
                }, 0);
            }
            function getMembersSharePrice(shareType, totalPrice, shareMembers){
                const shareTotal = Object.values(shareMembers).reduce((a, b) => a*1+b*1, 0);
                if(shareType === 'weight'){
                    if(shareTotal === 0){
                        return {
                            status: false,
                            error: '各成員權重總和不可為0'
                        };
                    }
                    return {
                        status: true,
                        data: Object.keys(shareMembers).reduce((obj, key) => {
                            obj[key] = totalPrice * shareMembers[key] / shareTotal;
                            return obj;
                        }, {})
                    };
                }else{
                    if(shareTotal !== totalPrice){
                        return {
                            status: false,
                            error: `總金額與各成員分攤金額總和不符，總金額為${totalPrice}，各成員分攤金額總和為${shareTotal}`
                        };
                    }
                    return {
                        status: true,
                        data: Object.keys(shareMembers).reduce((obj, key) => {
                            obj[key] = shareMembers[key] * 1;
                            return obj;
                        }, {})
                    };
                }
            }
            $(document).on('click', `.searchBtn`, function(event) {
                const searchBtn = $(this);
                const searchOldValue = searchBtn.attr('data-value') || '';
                swal({
                    title: '搜尋',
                    text: '請輸入搜尋關鍵字',
                    input: 'text',
                    inputValue: searchOldValue,
                    showCancelButton: true,
                    confirmButtonText: '搜尋',
                    cancelButtonText: '取消',
                }).then((searchInputValue) => {
                    searchBtn.attr('data-value', searchInputValue);
                    const costItems = $('#add_cost>.EditBody>.costItem');
                    costItems.show();
                    if(!searchInputValue){
                        return;
                    }
                    costItems.hide();
                    const searchNewValue = searchInputValue.toLowerCase();
                    costItems.each(function(e) {
                        const costItem = $(this);
                        const data = costItem.find('.data').text().toLowerCase();
                        if(data.indexOf(searchNewValue)>-1){
                            costItem.show();
                        }
                    });
                });
            });
            $(document).on('change', `input[name="costViewChart"]`, function(event) {
                const members = $(`input[name="costViewChart"]:checked`);
                if(members.length === 0){
                    $('.costViewChartItem').show();
                    return;
                }
                $('.costViewChartItem').hide();
                members.each(function(e) {
                    const obj = $(this);
                    const memberId = obj.data('memberid');
                    $(`.costViewChartItem:has(.costViewChartMember[data-memberid="${memberId}"])`).show();
                });
            });
            $(document).on('change', `input[name="costViewRepaidTo"]`, function(event) {
                const members = $(`input[name="costViewRepaidTo"]:checked`);
                if(members.length === 0){
                    $('.costViewRepaidToPayer').show();
                    return;
                }
                $('.costViewRepaidToPayer').hide();
                members.each(function(e) {
                    const obj = $(this);
                    const memberId = obj.data('memberid');
                    const payerId = obj.data('payerid');
                    $(`.costViewRepaidToPayer[data-payerid="${payerId}"]:has(.costViewRepaidToMember[data-memberid="${memberId}"])`).show();
                });
            });
            $(document).on('change', '[name="costItemShareType"]', function(event) {
                const shareType     = $('[name="costItemShareType"]:checked').val();
                const payerId       = $('[name="costItemPayer"]:checked').val();
                const oldShareType  = $('#costItemShareType>label.btn-success').data('type');
                const isChanged     = oldShareType !== shareType;
                $('#costItemShareType>label')
                    .removeClass('btn-success')
                    .addClass('btn-default');
                $(`#costItemShareType>label[data-type="${shareType}"]`)
                    .removeClass('btn-default')
                    .addClass('btn-success');
                let costItemShareMembers = $('#costItemShareMembers').clone();
                costItemShareMembers.html(`
                <div class="costItem-container title">
                    <div class="left-panel">
                        <div class="section-title">成員各別消費比例</div>
                    </div>
                    <div class="right-panel">
                        <div class="section-title">
                            <i class="fa fa-fw fa-users"></i>
                            <div class="repaidTo-group">
                                <i class="fa fa-fw fa-dollar"></i>
                                <i class="fa fa-fw fa-long-arrow-right"></i>
                            </div>
                            <i class="fa fa-fw fa-user-o"></i>
                        </div>
                    </div>
                </div>
                `);
                Object.keys(members).forEach(function(memberId){
                    const memberName = members[memberId];
                    let oldVal = (!isChanged && $('#costItemShareMember_'+memberId).val()) ? $('#costItemShareMember_'+memberId).val() : '0';
                    const payerChecked = (payerId === memberId) ? 'checked' : '';
                    const repaidChecked = $(`[name="costItemRepaidList"][value="${memberId}"`).prop('checked') ? 'checked' : '';
                    const repaidHide = (!payerId) ? 'hide' : '';
                    costItemShareMembers.append(`
                    <div class="costItem-container">
                        <div class="left-panel">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="costItemShareMember_${memberId}" data-id="${memberId}" min="0" placeholder=" " value="${oldVal}">
                                <label for="costItemShareMember_${memberId}">${memberName}</label>
                            </div>
                        </div>
                        <div class="right-panel">
                            <div class="checkbox-container">
                                <input
                                    type="checkbox"
                                    name="costItemPayer"
                                    class="form-checkbox fontAwesome"
                                    data-content="&#xf2c0;"
                                    value="${memberId}"
                                    ${payerChecked}
                                >
                                <input
                                    type="checkbox"
                                    name="costItemRepaidList"
                                    class="form-checkbox fontAwesome ${repaidHide}"
                                    data-content="&#xf155;"
                                    value="${memberId}"
                                    ${repaidChecked}
                                >
                            </div>
                        </div>
                    </div>
                    `);
                });
                $('#costItemShareMembers').replaceWith(costItemShareMembers);
            });
            $(document).on('change', '[name="costItemPayer"]', function(event) {
                const nowChecked = $(this).prop('checked');
                $('[name="costItemPayer"]').prop('checked', false);
                if(nowChecked){
                    $(this).prop('checked', true);
                }
                $('[name="costItemRepaidList"]').prop('checked', false);
                const payer = $('[name="costItemPayer"]:checked');
                const payerId = payer.val();
                $('[name="costItemRepaidList"]').addClass('hide');
                if(payer.length > 0){
                    $(`[name="costItemRepaidList"][value="${payerId}"`).prop('checked', true);
                    $('[name="costItemRepaidList"]').removeClass('hide');
                }
            });
            $(document).on('change', '[name="costItemRepaidList"]', function(event) {
                const nowChecked = $(this).prop('checked');
                const memberId = $(this).val();
                const payer = $(`[name="costItemPayer"][value="${memberId}"`);
                if(!nowChecked && payer.prop('checked')){
                    payer.prop('checked', false).change();
                }
            });
            function toggleEditMemberArea(mode){
                if(mode === 'show'){
                    $('#toggleEditMemberAreaBtn').attr('data-mode', 'hide').addClass('active');
                    $('#editMemberArea').show();
                    $('#createMemberArea').show();
                    $('#createMemberName').focus();
                }else{
                    $('#toggleEditMemberAreaBtn').attr('data-mode', 'show').removeClass('active');
                    $('#editMemberArea').hide();
                    $('#createMemberArea').hide();
                }
            }
            function updateTotal(){
                var total = 0;
                $('#add_cost>.EditBody>.costItem').each(function(e) {
                    total += $(this).find('.totalPrice').attr('data-price')*1;
                });
                $('#costTotal').html(formatNumber(total));
            }
            function formatNumber(number) {
                return new Intl.NumberFormat('zh-TW', { 
                    style: 'currency', 
                    currency: 'TWD', 
                    minimumFractionDigits: 0, 
                    maximumFractionDigits: 0 
                }).format(Math.round(number*1 || 0));
            }
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
            function AddInfo(action, data){
                let Html = '',
                    EditBody = $(`#${action}>.EditBody`),
                    Msg = `確定要刪除此「${$(this).parent().attr('title')}」嗎?`;
                switch(action){
                    case 'add_todo':
                        Html = `
                        <div class="editItem-container" title="待辦事項">
                            <div class="actions">
                                <input type="checkbox" class="form-checkbox square" ${data.checked}>
                            </div>
                            <div class="description-container">
                                <textarea class="form-control checkInput" rows="1" placeholder="例：必買伴手禮">${data.item || ''}</textarea>
                            </div>
                            <div class="actions">
                                <i class="fa fa-trash" onclick="delEditItemContainer($(this));"></i>
                            </div>
                        </div>
                        `;
                        break;
                    case 'add_note':
                        Html = `
                        <div class="editItem-container" title="行程筆記">
                            <div class="description-container">
                                <textarea class="form-control checkInput" rows="1" placeholder="例：伴手禮買了2盒">${data.item || ''}</textarea>
                            </div>
                            <div class="actions">
                                <i class="fa fa-trash" onclick="delEditItemContainer($(this));"></i>
                            </div>
                        </div>
                        `;
                        break;
                }
                if(action && Html){
                    EditBody.append(Html);
                    scrollToLast(action);
                }
            }
            function SaveInfo(action=null){
                let saveColumn = '',
                    saveJson = {};
                if(action === 'add_cost'){
                    $(`#${action}>.EditBody>`).sort(function(a, b){
                        return $(a).css('order') - $(b).css('order');
                    }).appendTo(`#${action}>.EditBody`);
                }
                $(`#${action}>.EditBody>`).each(function(e) {
                    switch(action){
                        case 'add_todo':
                            saveColumn = 'todo';
                            if(!saveJson['item']){
                                saveJson['item'] = [];
                                saveJson['checked'] = [];
                            }
                            if($(this).find('textarea').val()){
                                saveJson['item'].push($(this).find('textarea').val());
                                saveJson['checked'].push($(this).find('input[type="checkbox"]').prop('checked'));
                            }
                            break;
                        case 'add_note':
                            saveColumn = 'note';
                            if(!saveJson['item']){
                                saveJson['item'] = [];
                            }
                            if($(this).find('textarea').val()){
                                saveJson['item'].push($(this).find('textarea').val());
                            }
                            break;
                        case 'add_cost':
                            saveColumn = 'subject';
                            saveJson['members'] = members;
                            const itemDataJson = $(this).find('.data').html();
                            if(itemDataJson){
                                if(!saveJson['cost']){
                                    saveJson['cost'] = [];
                                }
                                const itemData = JSON.parse(itemDataJson);
                                saveJson['cost'].push(itemData);
                            }
                            break;
                    }
                });
                xajax_SaveInfo('{#$SelectStrokeItem.id#}', saveColumn, saveJson);
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
                $(document).on('keyup change paste', 'textarea', function(event) {
                    $(this).css('height', 'auto');
                    $(this).height(this.scrollHeight - 10);
                });
                $(document).on('click', '.press_button', function(event) {
                    $(this).parents('.press_background').hide();
                    const target = $(this).data('target');
                    const targetObj = $(target);
                    if(target === '#add_place'){
                        $('#OwnerArea').hide();
                        $('#ChooseActionArea').hide();
                        $('#RecordBlockArea').hide();
                        $('#SearchBlockArea').show();
                        $('#SearchArea').show();
                        $('#ShowAction_search').prop('checked', true);
                        $('#PlaceResult').html('');
                    }
                    targetObj.show();
                    targetObj.find('textarea').change();
                });
                toggleEditCostArea('hide');
                loadData();
                updateMemebers();
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
                        var Msg = proccessMsg(AltText, MsgJSON, ActionJSON);
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
                    $('.press_button[data-target="#{#$EditArea#}"]').click();
                    scrollToLast('{#$EditArea#}');
                {#/if#}
            });
            function proccessMsg(AltText, MsgJSON, ActionJSON){
                let Msg = [],
                    groupLength = 20;
                if(MsgJSON.type=='bubble' && MsgJSON.body.contents.length>20){
                    let msgContents = MsgJSON.body.contents;
                    let msgContentsLen = msgContents.length;
                    let msgContentsGroup = [];
                    let msgContentsGroupLen = Math.ceil(msgContentsLen/groupLength);
                    for(let i=0;i<msgContentsGroupLen;i++){
                        msgContentsGroup.push(msgContents.slice(i*groupLength, (i+1)*groupLength));
                    }
                    for(let i=0;i<msgContentsGroupLen;i++){
                        let msgContentsGroupItem = msgContentsGroup[i];
                        let msgContentsGroupItemLen = msgContentsGroupItem.length;
                        let msgContentsGroupItemJSON = JSON.parse(JSON.stringify(MsgJSON));
                        msgContentsGroupItemJSON.header.contents[0].contents[1].contents[1].text
                            += ' ('+ (i+1) +'/'+ msgContentsGroupLen +')';
                        msgContentsGroupItemJSON.body.contents = msgContentsGroupItem;
                        Msg.push({
                            "type": "flex",
                            "altText": AltText,
                            "contents": msgContentsGroupItemJSON
                        });
                    }
                }else{
                    Msg.push({
                        "type": "flex",
                        "altText": AltText,
                        "contents": MsgJSON
                    });
                }
                Msg.push({
                    "type": "flex",
                    "altText": AltText,
                    "contents": ActionJSON
                });
                console.log(JSON.stringify(Msg));
                return Msg;
            }
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
                const lastItemObj = $(`#${id}>.EditBody>div`).eq(-1);
                if(lastItemObj[0]){
                    lastItemObj[0].scrollIntoView();
                    lastItemObj.find('input[type="text"]').focus();
                    lastItemObj.find('textarea').focus();
                }
            }
        </script>
    </body>
</html>