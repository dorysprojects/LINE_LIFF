<?php

class kProcess {
    
    function AddRow($_this, $_Module){
        $SQL = new kSQL($_Module);
        $FILE = new kFile();
        
        $FileReturn = $FILE->upload(); //上傳檔案
        if($FileReturn){
            foreach ($FileReturn as $FileKey => $FileCtn) {
                if($FileKey=='subject' || $FileKey=='content'){
                    foreach ($FileCtn as $FileCtnKey => $FileValue) {
                        foreach ($FileValue as $FileValueKey => $value) {
                            if($FileCtnKey === 'PreviewImg'){
                                $_this->my['fields'][$FileKey][$FileCtnKey][$FileValueKey] = $value;
                            }else{
                                $_this->my['fields'][$FileKey][$FileValueKey] = $value;
                            }
                        }
                    }
                }
            }
        }
        
        $SQL->SetAction('insert');
        foreach ($_this->my['fields'] as $key => $value) {
            if($key=='subject' || $key=='content'){
                $SQL->SetValue($key, json_encode($value));
            }else{
                $SQL->SetValue($key, $value);
            }
        }
        $SQL->SetValue('create_at', $SQL->getNowTime())
            ->SetValue('update_at', $SQL->getNowTime());
        $state = $SQL->BuildQuery();
        $msg = '新增資料成功';
        
        return array(
            "state" => $state,
            "msg" => $msg,
            "preView" =>  json_encode($_this->my['fields']['content']),
        );
    }

    function UpdateRow($_this, $_Module){
        $SQL = new kSQL($_Module);
        $FILE = new kFile();
        $id = kCore_get('id');
        $OldData = $SQL->SetAction('select')->SetWhere("id='". $id ."'")->BuildQuery();
        $FileReturn = $FILE->upload('', $OldData[0], $_this->my['fields']); //上傳檔案
        if($FileReturn){
            foreach ($FileReturn as $FileKey => $FileCtn) {
                if($FileKey=='subject' || $FileKey=='content'){
                    foreach ($FileCtn as $FileCtnKey => $FileValue) {
                        foreach ($FileValue as $FileValueKey => $value) {
                            if($FileCtnKey === 'PreviewImg'){
                                $_this->my['fields'][$FileKey][$FileCtnKey][$FileValueKey] = $value;
                            }else{
                                $_this->my['fields'][$FileKey][$FileValueKey] = $value;
                            }
                        }
                    }
                }
            }
        }
        
        $SQL->SetAction('update')->SetWhere("id='". $id ."'");
        foreach ($_this->my['fields'] as $key => $value) {
            if($key=='subject' || $key=='content'){
                $SQL->SetValue($key, json_encode($value));
            }else{
                $SQL->SetValue($key, $value);
            }
        }
        $SQL->SetValue('update_at', $SQL->getNowTime());
        $state = $SQL->BuildQuery();
        $msg = '更新資料成功';
        
        return array(
            "state" => $state,
            "msg" => $msg,
            "preView" =>  json_encode($_this->my['fields']['content']),
        );
    }
    
    function DeleteMultiRows($_this, $_Module){
        if($_this->my['select']){
            $SQL = new kSQL($_Module);
            $FILE = new kFile();
            foreach ($_this->my['select'] as $id => $flag) {
                if($id!='' && $flag=='on'){
                    $OldData = $SQL->SetAction('select')->SetWhere("id='". $id ."'")->BuildQuery();
                    $FILE->delete($OldData[0]); //刪除檔案
                    $SQL->SetAction('delete')
                        ->SetWhere("id='". $id ."'")
                        ->BuildQuery();
                }
            }
            $state = true;
            $msg = '刪除資料成功';
        }else{
            $state = false;
            $msg = '無選取要刪除的資料';
        }
        
	return array(
            "state" => $state,
            "msg" => $msg,
        );
    }
    
    function SaveMultiRows($_this, $_Module){
        if($_this->my['fields']){
            $SQL = new kSQL($_Module);
            foreach ($_this->my['fields'] as $id => $item) {
                if($id!='' && $item){
                    if($item['subject'] || $item['content']){
                        $OldData = $SQL->SetAction('select')->SetWhere("id='". $id ."'")->BuildQuery();
                    }
                    $SQL->SetAction('update')
                        ->SetWhere("id='". $id ."'");
                        foreach ($item as $key => $value) {
                            if($key!='subject' && $key!='content'){
                                $SQL->SetValue($key, $value);
                            }
                        }
                        if($item['subject']){
                            foreach ($item['subject'] as $key => $value) {
                                $OldData[0]['subject'][$key] = $value;
                            }
                            $SQL->SetValue('subject', json_encode($OldData[0]['subject']));
                        }
                        if($item['content']){
                            foreach ($item['content'] as $key => $value) {
                                $OldData[0]['content'][$key] = $value;
                            }
                            $SQL->SetValue('content', json_encode($OldData[0]['content']));
                        }
                    $SQL->SetValue('update_at', $SQL->getNowTime())
                        ->BuildQuery();
                }
            }
            $state = true;
            $msg = '儲存資料成功';
        }
        
	return array(
            "state" => $state,
            "msg" => $msg,
        );
    }
    
    function Export($Title=NULL, $FromArrayVal=array(), $filename=NULL){
        if($Title && $FromArrayVal){
            include __PLUGIN . '/PHPExcel/PHPExcel.php';
            $filename = !empty($filename) ? $filename : $Title;
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->setTitle($Title);

            $objPHPExcel->getActiveSheet()->fromArray($FromArrayVal);
            /*
             * 生成Excel
             */
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
            header("Content-Type:application/force-download");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header("Content-Type:application/octet-stream");
            header("Content-Type:application/download");
            header('Content-Disposition:attachment;filename="' . $filename . '-' . date('Ymd-His') . '.xlsx"');
            header("Content-Transfer-Encoding:binary");
            ob_end_clean();
            $objWriter->save('php://output');
            exit();
        }
    }
    
}