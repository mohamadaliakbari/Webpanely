<?php

abstract class Webpanely_IndexTemplateAbstract {

    protected $activeModule;
    protected $dwoo;
    function __construct() {
        $this->activeModule = webpanely_LoadModule::getInstance()->load(false);
        $this->dwoo = new Dwoo();
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
        $data = array('a' => 5, 'b' => 6);
        $this->dwoo->output(Webpanely_TemplateFiles::getInstance()->file('tpl/AdminTemplate.html'), $data);
        //$this->dwoo->get(Webpanely_TemplateFiles::getInstance()->file('tpl/AdminTemplate.tpl'), $data);
        $this->activeModule->run();
    }

    public function lightHtml() {
        $this->activeModule->run();
    }

    public function noHtml() {
        $this->activeModule->run();
    }

}