<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Directory
 *
 * @author roshd
 */
class Webpanely_Directory {

    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Webpanely_Directory();
        }
        return self::$instance;
    }

    public function onlyDirectories($path = ".") {
        return $this->all($path, false, true);
    }

    public function onlyFiles($path) {
        return $this->all($path, true, false);
    }

    private function all($path = ".", $files = true, $dirs = true) {
        $myDirectory = opendir($path);
        $dirArray = array();
        while ($entryName = readdir($myDirectory)) {
            if ($entryName == "." || $entryName == "..") {
                continue;
            }
            if ($files) {
                if (is_file($path . "/" . $entryName)) {
                    $dirArray[$entryName] = $path . "/" . $entryName;
                }
            }
            if ($dirs) {
                if (is_dir($path . "/" . $entryName)) {
                    $dirArray[$entryName] = $path . "/" . $entryName;
                }
            }
        }
        closedir($myDirectory);
        return $dirArray;
    }

}