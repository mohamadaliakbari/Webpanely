<?php
class Webpanely_LoadTemplate {
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Webpanely_LoadTemplate();
        }
        return self::$instance;
    }

    public static function load($admin = false) {
        if ($admin) {
            if (!Webpanely_User::getInstance()->isAdmin) {
                Webpanely_Redirect::getInstance()->to(Webpanely_Config::getInstance()->index."?persian=member");
            }
            if (file_exists(Webpanely_Config::getInstance()->activeTemplatePath."/AdminTemplate.class.php")){
                require_once Webpanely_Config::getInstance()->activeTemplatePath."/AdminTemplate.class.php";
                $template = new AdminTemplate();
            } else {
                die("File ".Webpanely_Config::getInstance()->activeTemplatePath."/AdminTemplate.class.php"." not found!");
            }
        } else {
            if (file_exists(Webpanely_Config::getInstance()->activeTemplatePath."/IndexTemplate.class.php")){
                require_once Webpanely_Config::getInstance()->activeTemplatePath."/IndexTemplate.class.php";
                $template = new IndexTemplate();
            } else {
                die("File ".Webpanely_Config::getInstance()->activeTemplatePath."/IndexTemplate.class.php"." not found!");
            }
        }
        return $template;
    }
}