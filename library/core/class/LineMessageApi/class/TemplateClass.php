<?php

class TemplateClass {
    
    function __construct() {
        
    }
    
    function __destruct() {
        
    }

    function ProcessImageMap($item = NULL, $richmenu = FALSE) {
        $height = $item['subject']['imageH'];
        $width = $item['subject']['imageW'];
        $ValList = array();
        $ValList2 = array();
        
        switch ($item['subject']['MessageType']) {
            //長方形-100%
            case'ImageMap01':
                $width_index = floor($width / 3);
                $ValList = array(
                    0 => array($width_index * 0, $height * 0, $width_index * 1, $height / 2),
                    1 => array($width_index * 1, $height * 0, $width_index * 1, $height / 2),
                    2 => array($width_index * 2, $height * 0, ($width % 3 != 0) ? $width_index + 1 : $width_index, $height / 2),
                    3 => array($width_index * 0, $height / 2, $width_index * 1, $height / 2),
                    4 => array($width_index * 1, $height / 2, $width_index * 1, $height / 2),
                    5 => array($width_index * 2, $height / 2, ($width % 3 != 0) ? $width_index + 1 : $width_index, $height / 2),
                );
                break;
            case'ImageMap02':
                $width_index = floor($width / 2);
                $ValList = array(
                    0 => array($width_index * 0, $height * 0, $width_index * 1, $height / 2),
                    1 => array($width_index * 1, $height * 0, $width_index * 1, $height / 2),
                    2 => array($width_index * 0, $height / 2, $width_index * 1, $height / 2),
                    3 => array($width_index * 1, $height / 2, $width_index * 1, $height / 2),
                );
                break;
            case'ImageMap03':
                $width_index = floor($width / 3);
                $ValList = array(
                    0 => array($width_index * 0, $height * 0, $width_index * 3, $height / 2),
                    1 => array($width_index * 0, $height / 2, $width_index * 1, $height / 2),
                    2 => array($width_index * 1, $height / 2, $width_index * 1, $height / 2),
                    3 => array($width_index * 2, $height / 2, ($width % 3 != 0) ? $width_index + 1 : $width_index, $height / 2),
                );
                break;
            case'ImageMap04':
                $width_index = floor($width / 3);
                $ValList = array(
                    0 => array($width_index * 0, $height * 0, $width_index * 2, $height * 1),
                    1 => array($width_index * 2, $height * 0, ($width % 3 != 0) ? $width_index + 1 : $width_index, $height / 2),
                    2 => array($width_index * 2, $height / 2, ($width % 3 != 0) ? $width_index + 1 : $width_index, $height / 2),
                );
                break;
            case'ImageMap05':
                $ValList = array(
                    0 => array($width * 0, $height * 0, $width * 1, $height / 2),
                    1 => array($width * 0, $height / 2, $width * 1, $height / 2),
                );
                break;
            case'ImageMap06':
                $ValList = array(
                    0 => array($width * 0, 0, $width / 2, $height * 1),
                    1 => array($width / 2, 0, $width / 2, $height * 1),
                );
                break;
            case'ImageMap07':
                $ValList = array(
                    0 => array($width * 0, $height * 0, $width * 1, $height * 1),
                );
                break;
            case'ImageMap08':
                $ValList = array(
                    0 => array($width * 0, $height * 0, $width / 2, $height / 2),
                    1 => array($width / 2, $height * 0, $width / 2, $height * 1),
                    2 => array($width * 0, $height / 2, $width / 2, $height / 2),
                );
                break;
            case'ImageMap09':
                $width_index  = floor($width  / 2);
                $height_index = floor($height / 4);
                $ValList = array(
                    0 => array($width_index * 0, $height_index * 0, $width_index * 1, $height_index * 1),
                    1 => array($width_index * 1, $height_index * 0, $width_index * 1, $height_index * 1),
                    2 => array($width_index * 0, $height_index * 1, $width_index * 1, $height_index * 1),
                    3 => array($width_index * 1, $height_index * 1, $width_index * 1, $height_index * 1),
                    4 => array($width_index * 0, $height_index * 2, $width_index * 1, $height_index * 1),
                    5 => array($width_index * 1, $height_index * 2, $width_index * 1, $height_index * 1),
                    6 => array($width_index * 0, $height_index * 3, $width_index * 1, $height_index * 1),
                    7 => array($width_index * 1, $height_index * 3, $width_index * 1, $height_index * 1),
                );
                break;
            case'ImageMap10':
                $ValList = array(
                    0 => array($width  / 2 * 0, $height / 4 * 0, $width / 2, $height / 4),
                    1 => array($width  / 2 * 1, $height / 4 * 0, $width / 2, $height / 4),
                    2 => array($width  / 4 * 1, $height / 4 * 1, $width / 2, $height / 2),
                    3 => array($width  / 2 * 0, $height / 2 * 1, $width / 4, $height / 4),
                    4 => array($height / 4 * 3, $height / 2 * 1, $width / 4, $height / 4),
                );
                $ValList2 = array(
                    0 => array($width  / 4 * 0, $height / 4 * 1, $width / 4, $height / 4),
                    1 => array($height / 4 * 3, $height / 4 * 1, $width / 4, $height / 4),
                    2 => array($width  / 4 * 1, $height / 4 * 1, $width / 2, $height / 2),
                    3 => array($width  / 2 * 0, $height / 4 * 3, $width / 2, $height / 4),
                    4 => array($width  / 2 * 1, $height / 4 * 3, $width / 2, $height / 4),
                );
                break;
            case'ImageMap19':
                $width_index  = floor($width  / 4);
                $height_index = floor($height / 2);
                $ValList = array(
                    //上4
                    0 => array($width_index * 0, $height_index * 0, $width_index * 1, $height_index * 1),
                    1 => array($width_index * 1, $height_index * 0, $width_index * 1, $height_index * 1),
                    2 => array($width_index * 2, $height_index * 0, $width_index * 1, $height_index * 1),
                    3 => array($width_index * 3, $height_index * 0, $width_index * 1, $height_index * 1),
                    //下4
                    4 => array($width_index * 0, $height_index * 1, $width_index * 1, $height_index * 1),
                    5 => array($width_index * 1, $height_index * 1, $width_index * 1, $height_index * 1),
                    6 => array($width_index * 2, $height_index * 1, $width_index * 1, $height_index * 1),
                    7 => array($width_index * 3, $height_index * 1, $width_index * 1, $height_index * 1),
                );
                break;
            //正方形-100%(圖文)
            case'ImageMap11':
                $ValList = array(
                    0 => array($width * 0, $height * 0, $width * 1, $height * 1),
                );
                break;
            case'ImageMap12':
                $ValList = array(
                    0 => array($width * 0, $height * 0, $width / 2, $height * 1),
                    1 => array($width / 2, $height * 0, $width / 2, $height * 1),
                );
                break;
            case'ImageMap13':
                $ValList = array(
                    0 => array($width * 0, $height * 0, $width * 1, $height / 2),
                    1 => array($width * 0, $height / 2, $width * 1, $height / 2),
                );
                break;
            case'ImageMap14':
                $ValList = array(
                    0 => array($width * 0, $height / 3 * 0, $width * 1, $height / 3),
                    1 => array($width * 0, $height / 3 * 1, $width * 1, $height / 3),
                    2 => array($width * 0, $height / 3 * 2, $width * 1, $height / 3),
                );
                break;
            case'ImageMap15':
                $width_index = floor($width / 2);
                $ValList = array(
                    0 => array($width_index * 0, $height * 0, $width_index * 1, $height / 2),
                    1 => array($width_index * 1, $height * 0, $width_index * 1, $height / 2),
                    2 => array($width_index * 0, $height / 2, $width_index * 1, $height / 2),
                    3 => array($width_index * 1, $height / 2, $width_index * 1, $height / 2),
                );
                break;
            case'ImageMap16':
                $ValList = array(
                    0 => array($width * 0, $height * 0, $width * 1, $height / 2),
                    1 => array($width * 0, $height / 2, $width / 2, $height / 2),
                    2 => array($width / 2, $height / 2, $width / 2, $height / 2),
                );
                break;
            case'ImageMap17':
                $ValList = array(
                    0 => array($width * 0, $height * 0 * 1, $width * 1, $height / 2),
                    1 => array($width * 0, $height / 4 * 2, $width * 1, $height / 4),
                    2 => array($width * 0, $height / 4 * 3, $width * 1, $height / 4),
                );
                break;
            case'ImageMap18':
                $ValList = array(
                    0 => array($width * 0 * 1, $height * 0, $width / 3, $height / 2),
                    1 => array($width / 3 * 1, $height * 0, $width / 3, $height / 2),
                    2 => array($width / 3 * 2, $height * 0, $width / 3, $height / 2),
                    3 => array($width * 0 * 1, $height / 2, $width / 3, $height / 2),
                    4 => array($width / 3 * 1, $height / 2, $width / 3, $height / 2),
                    5 => array($width / 3 * 2, $height / 2, $width / 3, $height / 2),
                );
                break;
            //長方形-50%
            case'ImageMap20':
                $ValList = array(
                    0 => array($width * 0 * 1, $height * 0, $width / 4, $height * 1),
                    1 => array($width / 4 * 1, $height * 0, $width / 4, $height * 1),
                    2 => array($width / 4 * 2, $height * 0, $width / 4, $height * 1),
                    3 => array($width / 4 * 3, $height * 0, $width / 4, $height * 1),
                );
                break;
            case'ImageMap21':
                $ValList = array(
                    0 => array($width * 0, $height * 0, $width * 1, $height * 1),
                );
                break;
            case'ImageMap22':
                $ValList = array(
                    0 => array($width * 0, $height * 0, $width / 3 * 1, $height * 1),
                    1 => array($width / 3, $height * 0, $width / 3 * 2, $height * 1),
                );
                break;
            case'ImageMap23':
                $ValList = array(
                    0 => array($width * 0 * 1, $height * 0, $width / 3 * 2, $height * 1),
                    1 => array($width / 3 * 2, $height * 0, $width / 3 * 1, $height * 1),
                );
                break;
            case'ImageMap24':
                $ValList = array(
                    0 => array($width * 0 * 1, $height * 0, $width / 3, $height * 1),
                    1 => array($width / 3 * 1, $height * 0, $width / 3, $height * 1),
                    2 => array($width / 3 * 2, $height * 0, $width / 3, $height * 1),
                );
                break;
            case'ImageMap25':
                $ValList = array(
                    0 => array($width * 0, $height * 0, $width / 2, $height * 1),
                    1 => array($width / 2, $height * 0, $width / 2, $height * 1),
                );
                break;
            //長方形-滿版(圖文)
            case'ImageMap26':
                $ValList = array(
                    0 => array($width * 0, $height / 5 * 0, $width * 1, $height / 5 * 2),
                    1 => array($width * 0, $height / 5 * 2, $width * 1, $height / 5 * 1),
                    2 => array($width * 0, $height / 5 * 3, $width * 1, $height / 5 * 1),
                    3 => array($width * 0, $height / 5 * 4, $width * 1, $height / 5 * 1),
                );
                break;
            case'ImageMap27':
                $ValList = array(
                    0 => array($width * 0, $height / 6 * 0, $width * 1, $height / 6 * 3),
                    1 => array($width * 0, $height / 6 * 3, $width * 1, $height / 6 * 1),
                    2 => array($width * 0, $height / 6 * 4, $width * 1, $height / 6 * 1),
                    3 => array($width * 0, $height / 6 * 5, $width * 1, $height / 6 * 1),
                );
                break;
            //圖文 - 1040x(520~2080)
            case'ImageMap28':
                $ValList = array(
                    0 => array($width * 0, $height * 0, $width * 1, $height * 1),
                );
                break;
            //主選單 - (800~2500)x(250~)[≥1.45:1]
            case'ImageMap29':
                $ValList = array(
                    0 => array($width * 0, $height * 0, $width * 1, $height * 1),
                );
                break;
            case 'custom':
                $createData = !empty($item['subject']['createData']) ? json_decode($item['subject']['createData'], true) : array();
                if(!empty($createData)){
                    foreach ($createData as $key => $value) {
                        $ValList[] = array(
                            0 => $value['area']['y'],
                            1 => $value['area']['x'],
                            2 => $value['area']['width'],
                            3 => $value['area']['height'],
                        );
                    }
                }
                break;
        }
        if (!empty($ValList)) {
            foreach ($ValList as $key => $value) {
                $action[] = $this->get_action($item['subject']['Type_Area_' . ($key + 1)], $item['subject']['Value_Area_' . ($key + 1)], $value[0], $value[1], $value[2], $value[3], $richmenu, $item, $key);
            }
        }
        if (!empty($ValList2)) {
            foreach ($ValList2 as $key => $value) {
                $action[] = $this->get_action($item['subject']['Type_Area_' . ($key + 1)], $item['subject']['Value_Area_' . ($key + 1)], $value[0], $value[1], $value[2], $value[3], $richmenu, $item, $key);
            }
        }
        if(!empty($action)){
            $action = array_values(array_filter($action));
        }
        return $action;
    }

    function ProcessColumns($line = NULL, $item = NULL) {
        unset($columns);
        for ($columnsList = 0; $columnsList < 10; $columnsList++) {
            $subtitle = $item['subject']['subtitle' . $columnsList];
            $subcontent = $item['subject']['subcontent' . $columnsList];
            $pic = !empty($item['subject']['img' . $columnsList]) ? __WEB_UPLOAD . '/image/' . $item['subject']['img' . $columnsList] : NULL;
            if ($subcontent) {
                unset($actions);
                for ($action_item = 0; $action_item < 3; $action_item++) {
                    $action = $line->SetActions($item, $columnsList, $action_item);
                    if ($action) {
                        if($item['ReplyOrPush']=='liff'&&$action['type']!='uri'){
                            $action['type'] = 'noaction';
                        }
                        $actions[] = $action;
                    }
                }//Loop Actions
                if ($subcontent && $actions) {
                    $columns[] = $line->columns_v2($pic, $subtitle, $subcontent, $actions);
                    $actions = NULL;
                }
            }
        }//Loop Columns
        if ($columns) {
            $line->carousel($item['subject']['subject'], $columns);
        }
        return $line;
    }

    function ProcessImageColumns($line = NULL, $item = NULL) {
        unset($columns);
        for ($columnsList = 0; $columnsList < 10; $columnsList++) {
            $subtitle = $item['subject']['subtitle' . $columnsList];
            $subcontent = $item['subject']['subcontent' . $columnsList];
            $pic = !empty($item['subject']['img' . $columnsList]) ? __WEB_UPLOAD . '/image/' . $item['subject']['img' . $columnsList] : NULL;
            if ($pic) {
                unset($actions);
                for ($action_item = 0; $action_item < 1; $action_item++) {
                    $actions = $line->SetActions($item, $columnsList, $action_item);
                    if($actions){
                        if($item['ReplyOrPush']=='liff'&&$actions['type']!='uri'){
                            $actions['type'] = 'noaction';
                        }
                    }
                }//Loop Actions
                if ($pic && $actions) {
                    $columns[] = $line->image_columns($pic, $actions);
                    $actions = NULL;
                }
            }
        }//Loop Columns
        if ($columns) {
            $line->image_carousel($item['subject']['subject'], $columns);
        }
        return $line;
    }

    function get_action($type = NULL, $value = NULL, $x = NULL, $y = NULL, $width = NULL, $height = NULL, $richmenu = FALSE, $item = NULL, $GroupCtn = NULL) {
        $ReplyOrPush = ($item['ReplyOrPush'] == 'push') ? $item['ReplyOrPush'] : 'reply';
        if ($richmenu) {//richmenu
            switch ($type) {
                case 'uri':
                    $ReturnVal = array(
                        'bounds' => array(
                            "x" => round($x),
                            "y" => round($y),
                            "width" => round($width),
                            "height" => round($height)
                        ),
                        'action' => array(
                            "type" => 'uri',
                            "uri" => $value
                        )
                    );
                    $Act = 'hyperlink';
                    break;
                case 'text':
                    $ReturnVal = array(
                        'bounds' => array(
                            "x" => round($x),
                            "y" => round($y),
                            "width" => round($width),
                            "height" => round($height)
                        ),
                        'action' => array(
                            "type" => 'message',
                            "text" => $value
                        )
                    );
                    $Act = 'message';
                    break;
                case 'postback':
                    $ReturnVal = array(
                        'bounds' => array(
                            "x" => round($x),
                            "y" => round($y),
                            "width" => round($width),
                            "height" => round($height)
                        ),
                        'action' => array(
                            "type" => 'postback',
                            "data" => $value
                        )
                    );
                    break;
                default :
                    $ReturnVal = NULL;
                    break;
            }
        } else {//imagemap
            switch ($type) {
                case 'uri':
                    $ReturnVal = array(
                        "type" => 'uri',
                        'linkUri' => $value,
                        'area' => array(
                            "x" => round($x),
                            "y" => round($y),
                            "width" => round($width),
                            "height" => round($height)
                        )
                    );
                    $Act = 'hyperlink';
                    break;
                case 'text':
                    $ReturnVal = array(
                        "type" => 'message',
                        "text" => $value,
                        'area' => array(
                            "x" => round($x),
                            "y" => round($y),
                            "width" => round($width),
                            "height" => round($height)
                        )
                    );
                    $Act = 'message';
                    break;
                default :
                    $ReturnVal = NULL;
                    break;
            }
        }
        return $ReturnVal;
    }

}
