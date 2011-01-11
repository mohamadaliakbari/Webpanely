<?php

class Webpanely_Config {

    private $configs = array();
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Webpanely_Config();
        }
        return self::$instance;
    }

    public function __construct() {
        require_once 'library/Configs.array.php';
        $this->configs = $configs;
        if (file_exists($this->configs['activeTemplatePath'] . '/' . 'ExtraConfigs.array.php')) {
            require_once $this->configs['activeTemplatePath'] . '/' . 'ExtraConfigs.array.php';
            $this->configs = array_merge($this->configs, $extraConfigs);
        }
    }

    public function __get($name) {
        if (array_key_exists($name, $this->configs)) {
            return $this->configs[$name];
        }
    }

}