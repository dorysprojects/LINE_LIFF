<?php

class Notification {
    private $line;

    public function __construct() {
        $this->line = new kLineMessaging();
    }

    public function payAlert($orderInfo) {
        $message = array();
        $this->line->SetMessageObject($message);
    }

    public function paySuccess($userId) {
        if (count($this->line->action['data']) > 0) {
            $this->line->push($userId);
        }
    }

}