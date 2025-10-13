<?php
defined('ROOTPATH') OR exit("Access denied!");
// when we're looking for a class and it's not found this function finds it, and then we require it.
spl_autoload_register(function($className){
    
    $filename = "../app/models/". ucfirst($className) .".php";
    require $filename;
});
require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';