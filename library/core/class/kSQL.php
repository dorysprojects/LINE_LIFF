<?php

class kSQL{

    private $DBhost = NULL;
    private $DBuser = NULL;
    private $DBpwd = NULL;
    private $DBname = NULL;
    public $DBlink = NULL;
    private $DBtable = NULL;
    private $SelectTable = NULL;
    private $DBresult = NULL;
    private $CREATE_SQL = NULL;
    private $INSERT_SQL = NULL;
    private $SET_INDEX = NULL;
    private $PRIMARY_KEY_ID = NULL;
    private $AUTO_INCREMENT = NULL;
    private $insertId = 0;

    public $SystemRow = NULL;

    public $echoSQLFlag = NULL;
    public $echoQueryFlag = NULL;

    public $query = NULL;
    public $Build = NULL;

    function __construct($DBtable = NULL, $DBoption = NULL, $columnIndex = NULL) {
        $this->DBhost   = !empty($DBoption['DBhost'])   ? $DBoption['DBhost']   : __DB_HOST;
        $this->DBuser   = !empty($DBoption['DBuser'])   ? $DBoption['DBuser']   : __DB_USER;
        $this->DBpwd    = !empty($DBoption['DBpwd'])    ? $DBoption['DBpwd']    : __DB_PWD;
        $this->DBname   = !empty($DBoption['DBname'])   ? $DBoption['DBname']   : __DB_NAME;
        $this->setTable($DBtable);
        if(empty($this->DBhost) || empty($this->DBuser) ||  empty($this->DBpwd) || empty($this->DBname) || empty($this->DBtable)){
            die('資料庫連線資訊不完整!!');
        }

        $this->setConnection();
        
        $this->createTable($columnIndex);
        $this->SystemRow = $this->getSystem();
    }

    public function setTable($table) {
        $this->DBtable = $table;
    }
    
    private function checkConnection($connection) {
        return mysqli_ping($connection);
    }

    private function setConnection() {
        global $publicDatabaseConnection;
        $connectionKey = $this->DBhost . '_' . $this->DBuser . '_' . $this->DBpwd;
        if(!empty($publicDatabaseConnection[$connectionKey]) && $this->checkConnection($publicDatabaseConnection[$connectionKey])){
            $this->DBlink = $publicDatabaseConnection[$connectionKey];
            return;
        }

        $publicDatabaseConnection[$connectionKey]
            = $this->DBlink
            = mysqli_connect($this->DBhost, $this->DBuser, $this->DBpwd);
        if($this->DBlink === false)
            die('連線失敗!!');
        mysqli_select_db($this->DBlink, $this->DBname);
        mysqli_query($this->DBlink, "SET NAMES 'utf8mb4'");
        mysqli_query($this->DBlink, "SET character_set_results='utf8mb4'");
    }

    private function createTable($columnIndex = NULL) {
        $this->SelectTable = mysqli_query($this->DBlink, "SELECT 1 from $this->DBtable LIMIT 1;");
        if($this->SelectTable){
            return true;
        }
        $this->CREATE_SQL = "CREATE TABLE $this->DBtable (
            id int(11) NOT NULL,
            tablename varchar(255) DEFAULT '$this->DBtable',
            prev char(14) DEFAULT 'root',
            node char(14) DEFAULT NULL,
            next char(14) DEFAULT 'myself',
            subject text,
            content text,
            viewA char(10) DEFAULT NULL,
            viewB char(10) DEFAULT NULL,
            viewC char(10) DEFAULT NULL,
            viewD char(10) DEFAULT NULL,
            viewE char(10) DEFAULT NULL,
            sortA int(11) DEFAULT NULL,
            sortB int(11) DEFAULT NULL,
            sortC int(11) DEFAULT NULL,
            sortD int(11) DEFAULT NULL,
            sortE int(11) DEFAULT NULL,
            propertyA varchar(255) NOT NULL,
            propertyB varchar(255) NOT NULL,
            propertyC varchar(255) NOT NULL,
            propertyD varchar(255) NOT NULL,
            propertyE varchar(255) NOT NULL,
            prev1 varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
            prev2 varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
            prev3 varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
            prev4 varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
            prev5 varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
            lang varchar(10) DEFAULT 'zh_TW',
            create_at datetime DEFAULT NULL,
            update_at datetime DEFAULT NULL
          ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8";

        $this->PRIMARY_KEY_ID = "ALTER TABLE $this->DBtable ADD PRIMARY KEY (`id`);";

        $this->AUTO_INCREMENT = "ALTER TABLE $this->DBtable MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;";

        $propertyC = "";
        switch($this->DBtable){
            case '':
                $propertyC = "";
                break;
        }

        $this->INSERT_SQL = "INSERT INTO $this->DBtable (`id`, `tablename`, `prev`, `node`, `next`, `subject`, `content`, `viewA`, `viewB`, `viewC`, `viewD`, `viewE`, `sortA`, `sortB`, `sortC`, `sortD`, `sortE`, `propertyA`, `propertyB`, `propertyC`, `propertyD`, `propertyE`, `prev1`, `prev2`, `prev3`, `prev4`, `prev5`, `lang`, `create_at`, `update_at`) VALUES
        (1, 'SYSTEM', 'SYSTEM', 'SYSTEM', 'SYSTEM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '0', '', '".$propertyC."', '', '', '', '', '', '', '', 'zh_TW', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."');";

        if (mysqli_query($this->DBlink, $this->CREATE_SQL) && mysqli_query($this->DBlink, $this->PRIMARY_KEY_ID) && mysqli_query($this->DBlink, $this->AUTO_INCREMENT) && mysqli_query($this->DBlink, $this->INSERT_SQL)) {
            if(!empty($columnIndex)){
                $this->SET_INDEX = "ALTER TABLE $this->DBtable ADD INDEX($columnIndex);";
                mysqli_query($this->DBlink, $this->SET_INDEX);
            }
            return true;
        }else{
            return false;
        }
    }

    public function Close() {
        mysqli_close($this->DBlink);
    }

    public function getNowTime() {
        return date("Y-m-d G:i:s");
    }

    public function UnSetAll(){
        $this->echoSQLFlag = NULL;
        $this->echoQueryFlag = NULL;
        $this->Build = NULL;
        $this->query = NULL;
    }

    public function SetAction($action='', $flag=1){
        if(!empty($action) && $flag){
            $this->DBresult = NULL;
            $this->UnSetAll();
            $actionTmp = explode(' ', $action);
            if(count($actionTmp) > 1){
                $this->query['action'] = $action;
            }else{
                $this->query['action'] = strtoupper($action);
            }
        }
        return $this;
    }

    public function SetWhere($where='', $flag=1){
        if(!empty($where) && $flag){
            $this->query['where'][] = $where;
        }
        return $this;
    }

    public function SetValue($column='', $value='', $flag=1){
        if(!empty($column) && $flag){
            $this->query['value'][$column] = $value;
        }
        return $this;
    }

    public function SetCustom($custom, $flag=1){
        if(!empty($custom) && $flag){
            $this->query['custom'] = $custom;
        }
        return $this;
    }

    function SetGroup($group, $flag = 1) {
        if ($flag == 1){
            $this->query['group'] .= $group;
        }
        return $this;
    }

    public function SetOrder($order='', $flag=1){
        if($order && $flag){
            $this->query['order'][] = $order;
        }
        return $this;
    }

    public function SetOrderField($column='', $orderFeild=array(), $flag=1){
        if($column && $orderFeild && $flag){
            $orderFeild = implode("','", $orderFeild);
            $this->query['orderField'] .= $column . ",'" . $orderFeild . "',";
        }
        return $this;
    }

    public function SetLimit($limit='', $flag=1){
        if($flag){
            $this->query['limit'] = $limit;
        }
        return $this;
    }

    public function echoSQL($flag=0){
        if($flag){
            $this->echoSQLFlag = $flag;
        }
        return $this;
    }

    public function echoQuery($flag=0){
        if($flag){
            $this->echoQueryFlag = $flag;
        }
        return $this;
    }

    public function returnQuery($flag=0){
        if($flag){
            return $this->query;
        }
    }

    public function getAuto_INCREMENT($flag=1){
        if($flag){
            $this->DBresult = $this->sql("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='$this->DBname' AND TABLE_NAME='$this->DBtable'");
            return $this->DBresult[0]['AUTO_INCREMENT'];
        }
    }

    public function BuildQuery($flag=1){
        if($flag){
            $DefaultColumn = array(
                'id', 'tablename', 'prev', 'next',
                'subject', 'content',
                'viewA', 'viewB', 'viewC', 'viewD', 'viewE',
                'sortA', 'sortB', 'sortC', 'sortD', 'sortE',
                'propertyA', 'propertyB', 'propertyC', 'propertyD', 'propertyE',
                'prev1', 'prev2', 'prev3', 'prev4', 'prev5',
                'lang', 'create_at', 'update_at',
            );
            if($this->query['action']){
                $this->Build = $this->query['action'];
                switch ($this->query['action']) {
                    case 'SELECT':
                        $this->Build .= " * FROM $this->DBtable ";
                        break;
                    case 'DELETE':
                        $this->Build .= " FROM $this->DBtable ";
                        break;
                    case 'UPDATE':
                        $this->Build .= " $this->DBtable SET ";
                        break;
                    case 'REPLACE':
                    case 'INSERT':
                        $this->Build .= " INTO $this->DBtable ";
                        break;
                    default :
                        $this->Build .= " ";
                        break;
                }
            }else{
                die('action 請勿為空==>' . __FILE__ . ':' . __LINE__ . '行');
            }

            switch ($this->query['action']) {
                case 'UPDATE':
                    if($this->query['value']){
                        $ValueQuery = '';
                        foreach ($this->query['value'] as $column => $value) {
                            if($column=='subject' || $column=='content'){
                                if(is_array($value)){
                                    die('subject,content 需為json格式==>' . __FILE__ . ':' . __LINE__ . '行');
                                }else{
                                    $value = addslashes($value);
                                }
                            }else if($column=='id' || empty($column)){
                                die('value 條件有誤==>' . __FILE__ . ':' . __LINE__ . '行');
                            }
                            if($ValueQuery){
                                $ValueQuery .= ", $column='$value' ";//N
                            }else{
                                $ValueQuery = "$column='$value'";//N
                            }
                        }
                        $this->Build .= $ValueQuery;
                    }else{
                        die('value 請勿為空==>' . __FILE__ . ':' . __LINE__ . '行');
                    }
                    break;
                case 'REPLACE':
                case 'INSERT':
                    if($this->query['value']){
                        $ColumnQuery = '';
                        $ValueQuery = '';
                        foreach ($this->query['value'] as $column => $value) {
                            if($column=='subject' || $column=='content'){
                                if(is_array($value)){
                                    die('subject,content 需為json格式==>' . __FILE__ . ':' . __LINE__ . '行');
                                }else{
                                    $value = addslashes($value);
                                }
                            }else if($column=='id' || empty($column)){
                                die('value 條件有誤==>' . __FILE__ . ':' . __LINE__ . '行');
                            }
                            if($ColumnQuery){
                                $ColumnQuery .= ", $column";
                            }else{
                                $ColumnQuery = $column;
                            }
                            if($ValueQuery){
                                $ValueQuery .= ", '$value'";//N
                            }else{
                                $ValueQuery = "'$value'";//N
                            }
                        }
                        $this->Build .= "($ColumnQuery) VALUES ($ValueQuery)";
                    }else{
                        die('value 請勿為空==>' . __FILE__ . ':' . __LINE__ . '行');
                    }
                    break;
                case 'SELECT':
                case 'DELETE':
                    break;
            }

            switch ($this->query['action']) {
                case 'REPLACE':
                case 'INSERT':
                    break;
                case 'SELECT':
                case 'DELETE':
                case 'UPDATE':
                default :
                    if($this->query['where']){
                        $WhereQuery = '';
                        foreach ($this->query['where'] as $key => $query) {
                            $Legal = explode("='", $query);
                            if(!$Legal[1]){
                                $Legal = explode("= '", $query);
                            }
                            if(!$Legal[1]){
                                $Legal = explode(" like ", $query);
                            }
                            if(!$Legal[1]){
                                $Legal = explode(" LIKE ", $query);
                            }
                            if(!$Legal[1]){
                                $Legal = explode(" in ", $query);
                            }
                            if(!$Legal[1]){
                                $Legal = explode(" IN ", $query);
                            }
                            if(!$Legal[1]){
                                $Legal = explode(" is ", $query);
                            }
                            if(!$Legal[1]){
                                $Legal = explode(" IS ", $query);
                            }
                            if(!$Legal[1]){
                                $Legal = explode(" <= ", $query);
                            }
                            if(!$Legal[1]){
                                $Legal = explode(" < ", $query);
                            }
                            if(!$Legal[1]){
                                $Legal = explode(" >= ", $query);
                            }
                            if(!$Legal[1]){
                                $Legal = explode(" > ", $query);
                            }
                            if(!$Legal[1]){
                                $Legal = explode(" BETWEEN ", $query);
                            }
                            if($Legal[1]){
                                if($WhereQuery){
                                    $WhereQuery .= " AND ($query)";
                                }else{
                                    $WhereQuery = "WHERE ($query)";
                                }
                            }else{
                                die('where 條件有誤==>' . __FILE__ . ':' . __LINE__ . '行');
                            }
                        }
                        $this->Build .= $WhereQuery;
                    }else{
                        die('where 請勿為空==>' . __FILE__ . ':' . __LINE__ . '行');
                    }
                    break;
            }

            switch ($this->query['action']) {
                case 'REPLACE':
                case 'INSERT':
                case 'DELETE':
                case 'UPDATE':
                    break;
                case 'SELECT':
                default :
                    $_Verity = 0;
                    if($this->query['action']==='SELECT'){
                        $_Verity = 1;
                    }else{
                        $Legal = explode("SELECT", $this->query['action']);
                        if(!$Legal[1]){
                            $Legal = explode("select", $this->query['action']);
                        }
                        if($Legal[1]){
                            $_Verity = 1;
                        }
                    }

                    if($_Verity){
                        if($this->query['group']){
                            $this->Build .= " GROUP BY " . $this->query['group'];
                        }
                        if($this->query['orderField']){
                            $this->Build .= " ORDER BY FIELD (". $this->query['orderField'] .")";
                        }else{
                            if($this->query['order']){
                                $this->Build .= " ORDER BY " . implode(',', $this->query['order']);
                            }else{
                                $this->Build .= " ORDER BY id desc";
                            }
                        }
                        if($this->query['limit']){
                            $this->Build .= " LIMIT " . $this->query['limit'];
                        }
                    }
                    break;
            }

            if($this->query['custom']){
                $this->Build .= $this->query['custom'];
            }

            if($this->echoQueryFlag){
                print_r($this->query);
            }
            if($this->echoSQLFlag){
                print_r($this->Build . "\n");
            }

            $this->DBresult = $this->sql($this->Build);
            $this->insertId = mysqli_insert_id($this->DBlink);
            if($this->query['action']=='INSERT' || $this->query['action']=='REPLACE'){
                $this->SystemRow[0]['propertyA'] = (!empty($this->SystemRow[0]['propertyA'])) ? $this->SystemRow[0]['propertyA']+1 : 1;
                $this->sql("UPDATE $this->DBtable SET propertyA='".$this->SystemRow[0]['propertyA']."' WHERE id='1'");
            }
        }
        $this->UnSetAll();
        return $this->DBresult;
    }

    public function getSystem(){
        return $this->sql("SELECT * FROM $this->DBtable WHERE id='1'");
    }

    public function getRow($query = NULL){
        if(!empty($query)){
            return mysqli_fetch_array($query, MYSQLI_ASSOC);
        }
    }

    public function getInsertId(){
        return $this->insertId;
    }

    public function sql($query = NULL){
        if($query){
            $__DBresult = mysqli_query($this->DBlink, $query);
            switch ($this->query['action']) {
                case 'REPLACE':
                case 'INSERT':
                case 'DELETE':
                case 'UPDATE':
                    return $__DBresult;
                    break;
                case 'SELECT':
                default :
                    if(!empty($__DBresult)){
                        $ResultRows = array();
                        while ($row = $this->getRow($__DBresult)){
                            if (empty($row)) continue;
                            foreach ($row as $key => $val) {
                                if($key==='subject' || $key==='content'){
                                    $row[$key] = $val ? json_decode($val, true) : array();
                                }
                            }
                            $ResultRows[] = $row;
                        }
                        return $ResultRows;
                    }
                    break;
            }
        }
    }
}