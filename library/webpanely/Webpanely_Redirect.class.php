<?php
class Webpanely_Redirect {
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Webpanely_Redirect();
        }
        return self::$instance;
    }

    public function to($url){
        header("LOCATION: ".$url);
        exit();
    }
}