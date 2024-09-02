<?php

namespace ECPay;

class CheckMacValueService{

    const METHOD_MD5 = 'md5';
    const METHOD_SHA256 = 'sha256';

    private $HashKey = '';
    private $HashIV = '';
    private $method = '';

    public function __construct($key, $iv, $method=self::METHOD_SHA256){
        $this->HashKey = $key;
        $this->HashIV = $iv;
        $this->method = $method;
    }

    //附加檢查碼
    public function append($source, $isSort = true) {
        $source[$this->getFieldName()] = $this->generate($source);
        if ($isSort) {
            $source = $this->sort($source);
        }
        return $source;
    }

    //產生檢查碼
    public function generate(array $parameter): string {
        $filtered = $this->filter($parameter);
        $sorted = $this->sort($filtered);
        $combined = $this->toEncodeSourceString($sorted);
        $encoded = $this->replaceSpecialChar($combined);
        $hashed = $this->hash($encoded);
        $checkMacValue = strtoupper($hashed);
        return $checkMacValue;
    }

    //檢核檢查碼
    public function verify($source){
        $checkMacValue = $this->generate($source);
        return ($checkMacValue === $source[$this->getFieldName()]);
    }

    //取得壓碼欄位名稱
    public function getFieldName(){
        return 'CheckMacValue';
    }

    private function filter($source){
        if(isset($source[$this->getFieldName()])){
            unset($source[$this->getFieldName()]);
        }
        return $source;
    }

    private function sort($source){
        uksort($source, 'self::merchantSort');
        return $source;
    }

    //仿自然排序法
    private function merchantSort($a, $b) {
        return strcasecmp($a, $b);
    }

    private function toEncodeSourceString($source){
        $combined = 'HashKey=' . $this->HashKey;
        foreach ($source as $name => $value) {
            $combined .= '&' . $name . '=' . $value;
        }
        $combined .= '&HashIV=' . $this->HashIV;
        return urlencode($combined);
    }

    private function replaceSpecialChar($source): string {
        $encoded = str_replace(
            array('%2d', '%5f', '%2e', '%21', '%2a', '%28', '%29'),
            array('-'  , '_'  , '.'  , '!'  , '*'  , '('  , ')'  ),
            $source
        );
        return strtolower($encoded);
    }

    private function hash($source): string {
        if($this->method == 'md5'){
            $hashed = md5($source);
        }else{
            $hashed = hash('sha256', $source);
        }
        $uppered = strtoupper($hashed);
        return $uppered;
    }
}