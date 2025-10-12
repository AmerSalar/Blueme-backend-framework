<?php 
defined('ROOTPATH') OR exit("Access denied!");
Trait Controller {
    public function view($name) {
        $filename = "../app/views/".$name.".view.php";
        if(file_exists($filename)) {
            require $filename;
        } else {
            require "../app/views/_404.view.php";
        }
    }
}