<?php

class kHtml {
    
    public $__CustomStickers = NULL;
    public $__CustomStickers_Web = NULL;
    public $__LIB = NULL;
    public $__LIBRARY = NULL;
    
    function __construct() {
        $this->__CustomStickers = __CustomStickers;
        $this->__CustomStickers_Web = __CustomStickers_Web;
        $this->__LIB = __LIB;
        $this->__LIBRARY = __LIBRARY;
    }
    
    public function get($type=NULL, $data=NULL) {
        if($type){
            return $this->{$type}($data);
        }
    }
    
    public function nail() {
        return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 20 20" style="vertical-align:-6px;margin-right:5px;">
                    <path fill="#fff" d="M18 6.793l-5.293-5.293c-0.188-0.188-0.44-0.292-0.707-0.292s-0.519 0.104-0.707 0.292l-0.293 0.293c-0.29 0.29-0.5 0.797-0.5 1.207v1c0 0.142-0.106 0.399-0.207 0.5l-2.793 2.793c-0.101 0.101-0.358 0.207-0.5 0.207h-1c-0.41 0-0.917 0.21-1.207 0.5l-0.293 0.293c-0.39 0.39-0.39 1.024 0 1.414l1.553 1.553-4.95 6.435c-0.153 0.199-0.135 0.481 0.043 0.658 0.097 0.097 0.225 0.146 0.354 0.146 0.107 0 0.214-0.034 0.305-0.104l6.435-4.95 1.553 1.553c0.188 0.188 0.44 0.292 0.707 0.292s0.519-0.104 0.707-0.292l0.293-0.293c0.29-0.29 0.5-0.797 0.5-1.207v-1c0-0.142 0.106-0.399 0.207-0.5l2.793-2.793c0.101-0.101 0.358-0.207 0.5-0.207h1c0.41 0 0.917-0.21 1.207-0.5l0.293-0.293c0.188-0.188 0.292-0.44 0.292-0.707s-0.104-0.519-0.292-0.707zM4.234 15.266l2.533-3.293 0.76 0.76-3.293 2.533zM17 7.793c-0.101 0.101-0.358 0.207-0.5 0.207h-1c-0.41 0-0.917 0.21-1.207 0.5l-2.793 2.793c-0.29 0.29-0.5 0.797-0.5 1.207v1c0 0.142-0.106 0.399-0.207 0.5l-0.292 0.292c-0 0-0.001 0-0.001 0v0.001l-5.293-5.293 0.293-0.293c0.101-0.101 0.358-0.207 0.5-0.207h1c0.41 0 0.917-0.21 1.207-0.5l2.793-2.793c0.29-0.29 0.5-0.797 0.5-1.207v-1c0-0.142 0.106-0.399 0.207-0.5l0.293-0.293 5.293 5.293-0.293 0.293z"/>
                </svg>';
    }
    
    public function arrow() {
        return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 20 20" style="vertical-align:-6px;margin-left:5px;transform:rotate(-90deg);transition:transform 0.5s ease-in;position:absolute;top:5px;right:5px;" onclick="tips_switch(this);">
                    <path fill="#fff" d="M0 15c0 0.128 0.049 0.256 0.146 0.354 0.195 0.195 0.512 0.195 0.707 0l8.646-8.646 8.646 8.646c0.195 0.195 0.512 0.195 0.707 0s0.195-0.512 0-0.707l-9-9c-0.195-0.195-0.512-0.195-0.707 0l-9 9c-0.098 0.098-0.146 0.226-0.146 0.354z"/>
                </svg>';
    }
    
    public function close($style='font-size: 25px;color: #fff;') {
        return '<div onclick="$(this).parent().hide();" class="X"><i class="fa fa-close" style="'. $style .'"></i></div>';
    }
    
    public function pic(){
        return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 20 20">
                    <path fill="#f58e31" d="M18.5 20h-17c-0.827 0-1.5-0.673-1.5-1.5v-17c0-0.827 0.673-1.5 1.5-1.5h17c0.827 0 1.5 0.673 1.5 1.5v17c0 0.827-0.673 1.5-1.5 1.5zM1.5 1c-0.276 0-0.5 0.224-0.5 0.5v17c0 0.276 0.224 0.5 0.5 0.5h17c0.276 0 0.5-0.224 0.5-0.5v-17c0-0.276-0.224-0.5-0.5-0.5h-17z"/>
                    <path fill="#f58e31" d="M13 9c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM13 6c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"/>
                    <path fill="#f58e31" d="M17.5 2h-15c-0.276 0-0.5 0.224-0.5 0.5v12c0 0.276 0.224 0.5 0.5 0.5h15c0.276 0 0.5-0.224 0.5-0.5v-12c0-0.276-0.224-0.5-0.5-0.5zM3 11.69l3.209-3.611c0.082-0.092 0.189-0.144 0.302-0.145s0.221 0.048 0.305 0.138l5.533 5.928h-9.349v-2.31zM17 14h-3.283l-6.169-6.61c-0.279-0.299-0.651-0.461-1.049-0.456s-0.766 0.176-1.037 0.481l-2.462 2.77v-7.185h14v11z"/>
                </svg>';
    }
    
    public function link(){
        return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 20 20">
                    <path fill="#f58e31" d="M10.682 12.998c-0.943 0-1.886-0.359-2.604-1.077-0.195-0.195-0.195-0.512 0-0.707s0.512-0.195 0.707 0c1.046 1.046 2.747 1.046 3.793 0l3.636-3.636c1.046-1.046 1.046-2.747 0-3.793s-2.747-1.046-3.793 0l-3.068 3.068c-0.195 0.195-0.512 0.195-0.707 0s-0.195-0.512 0-0.707l3.068-3.068c1.436-1.436 3.772-1.436 5.207 0s1.436 3.772 0 5.207l-3.636 3.636c-0.718 0.718-1.661 1.077-2.604 1.077z"/>
                    <path fill="#f58e31" d="M4.682 18.998c-0.943 0-1.886-0.359-2.604-1.077-1.436-1.436-1.436-3.772 0-5.207l3.636-3.636c1.436-1.436 3.772-1.436 5.207 0 0.195 0.195 0.195 0.512 0 0.707s-0.512 0.195-0.707 0c-1.046-1.046-2.747-1.046-3.793 0l-3.636 3.636c-1.046 1.046-1.046 2.747 0 3.793s2.747 1.046 3.793 0l3.068-3.068c0.195-0.195 0.512-0.195 0.707 0s0.195 0.512 0 0.707l-3.068 3.068c-0.718 0.718-1.661 1.077-2.604 1.077z"/>
                </svg>';
    }
    
    public function upload_form(){
        return '<form id="upload_form" action="'. $this->__LIBRARY .'/core/func/kPrewPic.php" enctype="multipart/form-data" method="POST" style="text-align:center;">
                    <label class="btn_info">
                        <input type="hidden" name="localfile" value="localfile">
                        <input type="file" name="fileData" size="35" accept="image/*" style="display:none;" onchange="upload_file(this);">
                        '.$this->pic().'
                        <span style="vertical-align:30%;margin-left:5px;">選擇圖片<span>
                        <span id="file_result" style="margin-left:10px;"></span>
                    </label>
                    <label id="get_link" class="btn_info" style="margin-top:5px;width:auto;padding:10px 40px;display:none;">
                        <input type="submit" name="submit" value="產生連結" style="display:none;">
                        '.$this->link().'
                        <span style="vertical-align:30%;margin-left:5px;">產生圖片網址<span>
                    </label>
                </form>';
    }
    
    function getJsFile($path=NULL){
        if($path){
            ob_start();
            if(file_exists($path)){
                include $path;
            }
            return ob_get_clean();
        }
    }
    
    
}