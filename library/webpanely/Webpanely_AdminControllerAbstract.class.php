<?php

abstract class Webpanely_AdminControllerAbstract {

    public function css() {
        
    }

    public function js() {

    }

    public function onLoad() {

    }

    public function onClass() {
        
    }

    abstract function run();

    abstract function install();
}
