<?php

class Webpanely_TemplateFiles {

    private $try1 = '';
    private $try2 = '';
    private $try3 = '';
    private $try4 = '';
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Webpanely_TemplateFiles();
        }
        return self::$instance;
    }

    public function __construct() {
        $this->try1 = Webpanely_Config::getInstance()->activeTemplatePath . '/' . Webpanely_User::getInstance()->language . '/';
        $this->try2 = Webpanely_Config::getInstance()->activeTemplatePath . '/ll/';
        $this->try3 = 'templates/gtf/' . Webpanely_User::getInstance()->language . '/';
        $this->try4 = 'templates/gtf/ll/';
    }

    public function file($filename) {
        if (file_exists($this->try1 . $filename)) {
            return $this->try1 . $filename;
        } elseif (file_exists($this->try2 . $filename)) {
            return $this->try2 . $filename;
        } elseif (file_exists($this->try3 . $filename)) {
            return $this->try3 . $filename;
        } elseif (file_exists($this->try4 . $filename)) {
            return $this->try4 . $filename;
        } else {
            return $filename;
        }
    }

}