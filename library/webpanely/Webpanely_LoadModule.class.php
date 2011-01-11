<?php
class webpanely_LoadModule {

    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new webpanely_LoadModule();
        }
        return self::$instance;
    }

    public static function load($admin = false) {
        if(empty ($_GET['persian'])) {
            $_GET['persian'] = Webpanely_Config::getInstance()->defaultModule;
        }
        $moduleName = strtolower($_GET["persian"]);
        $modules = Webpanely_Directory::getInstance()->onlyDirectories("./modules");
        $extraModules = Webpanely_Directory::getInstance()->onlyDirectories(Webpanely_Config::getInstance()->activeTemplatePath."/extramodules");
        $moduleDir = "";
        if (array_key_exists($moduleName, $extraModules)) {
            $moduleDir = $extraModules[$moduleName];
        } else if (array_key_exists($moduleName, $modules)) {
            $moduleDir = $modules[$moduleName];
        }

        if (!$admin && file_exists($moduleDir . '/IndexController.class.php')) {
            require_once $moduleDir . '/IndexController.class.php';
            return new IndexController();
        } elseif ($admin && file_exists($moduleDir . '/AdminController.class.php')) {
            require_once $moduleDir . '/AdminController.class.php';
            return new AdminController();
        } else {
            die("Module ". $moduleName ." Not Exists");
        }
    }

}