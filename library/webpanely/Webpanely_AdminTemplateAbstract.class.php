<?php

abstract class Webpanely_AdminTemplateAbstract {

    protected $activeModule;

    function __construct() {
        $this->activeModule = webpanely_LoadModule::getInstance()->load(true);
    }

    public function css() {

    }

    public function js() {

    }

    public function onLoad() {

    }

    public function onClass() {

    }

    public function html() {
        $dwoo = new Dwoo();
        $data = array('a' => 5, 'b' => 6);
        $dwoo->output(Webpanely_TemplateFiles::getInstance()->file('tpl/AdminTemplate.html'), $data);
        $this->activeModule->run();
    }

    public function lightHtml() {
        $this->activeModule->run();
    }

    public function noHtml() {
        $this->activeModule->run();
    }

}