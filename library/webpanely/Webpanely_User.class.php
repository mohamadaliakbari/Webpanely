<?php

class Webpanely_User {

    private $info = array(
        "isAdmin" => false,
        "language" => "fa",
    );
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Webpanely_User();
        }
        return self::$instance;
    }

    public function __get($name) {
        if (array_key_exists($name, $this->info)) {
            return $this->info[$name];
        }
    }

}