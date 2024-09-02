<?php

$LabelList = array(
    '__LineMessageAPIAccessToken' => '【Line Message API】參數',
    '__LogNotifyToken' => '【Line Notify】參數',
    '__LineLoginSecret' => '【Line Login】參數',
    '__LIFF_ANSWER__ID' => '【LIFF清單】參數',
    '__GoogleApiToken' => '【Google API】參數',
    '__FB_Page_Picture' => '【Facebook API】參數',
);
$columns = array();
if(defined('__Parameter') && !empty(__Parameter)){
    $__ParameterHtml = '';
    foreach (__Parameter as $__ParameterKey => $__ParameterValue) {
        if(defined($__ParameterValue)){
            $__ParameterHtml .= '<div class="form-group">
                                    * <label for="'.$__ParameterValue.'">'.$__ParameterValue.'</label>
                                    <input required="" id="'.$__ParameterValue.'" name="fields[subject]['.$__ParameterValue.']" type="text" value="'.constant($__ParameterValue).'" class="form-control " placeholder="請輸入'.$__ParameterValue.'">
                                </div>';
            if(!empty($LabelList[$__ParameterValue])){
                $columns[] = array(
                    "type" => "view",
                    "label" => '',
                    "value" => '<div class="box box-warning">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">'.$LabelList[$__ParameterValue].'</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" onclick="if($(\'#'.$__ParameterValue.'Body\').css(\'display\')===\'none\'){ $(this).find(\'i\').addClass(\'fa-minus\').removeClass(\'fa-plus\');$(\'#'.$__ParameterValue.'Body\').show(); }else{ $(this).find(\'i\').addClass(\'fa-plus\').removeClass(\'fa-minus\');$(\'#'.$__ParameterValue.'Body\').hide(); }">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="'.$__ParameterValue.'Body" class="box-body">
                                        '.$__ParameterHtml.'
                                    </div>
                                </div>',
                );
                $__ParameterHtml = '';
            }
        }
    }
}
$TPL->assign('columns', $columns);
$TPL->display($_FromViewPath."/add.tpl");