<?php

    function AddRow($_this, $_Module){
        $PS = new kProcess();
        $return = $PS->AddRow($_this, $_Module);
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }

    function UpdateRow($_this, $_Module){
        $PS = new kProcess();
        if(kCore_CheckAuthority('Tag', 'index') && !empty($_this->my['fields']['subject']['SelectOptions'])){
            $SelectOptions = !empty($_this->my['fields']['subject']['SelectOptions']) ? explode('+', $_this->my['fields']['subject']['SelectOptions']) : array();
            $Tags = !empty($_this->my['fields']['subject']['Tags']) ? explode('+', $_this->my['fields']['subject']['Tags']) : array();
            if(!empty($SelectOptions)){
                foreach ($SelectOptions as $key => $value) {
                    kCore_Tag((!empty($Tags)&&in_array($value, $Tags))?'SelectAndUpdate':'SelectAndDelete', array(
                        "id" => $value,
                        "userId" => $_this->my['fields']['subject']['UID'],
                    ));
                }
            }
            $return = array(
                'state' => true,
            );
        }else{
            $return = $PS->UpdateRow($_this, $_Module);
        }
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }
    
    function DeleteMultiRows($_this, $_Module){
        $PS = new kProcess();
        $return = $PS->DeleteMultiRows($_this, $_Module);
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }
    
    function SaveMultiRows($_this, $_Module){
        $PS = new kProcess();
        $return = $PS->SaveMultiRows($_this, $_Module);
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }

$_From = kCore_get('FrontEndAndBackEnd', $_SERVER['PATH_TRANSLATED']);
$_Module = !empty($_From) ? kCore_get($_From, $_SERVER['PATH_TRANSLATED']) : '';
$_Action = ($_From=='backend') ? kCore_get($_Module) : '';
//執行請求函數
$_this = new stdClass();
if($_POST){
    $_this->my = $_POST;
}
if($_GET){
    $_this->my = $_this->my ? array_merge($_this->my, $_GET) : $_GET;
}
$ps = kCore_get('ps');
if (function_exists($ps))
	call_user_func($ps, $_this, $_Module);
else
	echo $ps . '請求不存在';
exit;

?>