<?php
session_start();
header('Content-type: text/html;charset=utf-8');
include 'library/functions/Autoloader.function.php';
Webpanely_LoadTemplate::getInstance()->load(false)->html();