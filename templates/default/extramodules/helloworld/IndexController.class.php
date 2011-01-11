<?php

class IndexController extends Webpanely_IndexControllerAbstract {

    public function run() {
        try {
            dibi::connect(array(
                        'driver' => Webpanely_Config::getInstance()->dbDriver,
                        'host' => Webpanely_Config::getInstance()->dbHost,
                        'username' => Webpanely_Config::getInstance()->dbUsername,
                        'password' => Webpanely_Config::getInstance()->dbPassword,
                        'database' => Webpanely_Config::getInstance()->dbName,
                        'options' => array(
                            MYSQLI_OPT_CONNECT_TIMEOUT => 30
                        ),
                        'flags' => MYSQL_CLIENT_COMPRESS,
                    ));
            echo 'OK';
        } catch (DibiException $e) {
            echo get_class($e), ': ', $e->getMessage(), "\n";
        }
    }

}