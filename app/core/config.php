<?php
defined('ROOTPATH') OR exit("Access denied!");
if($_SERVER['SERVER_NAME'] == 'localhost') {
    define('ROOT', "http://localhost/Blueme 2.0/public");
    define('DB_HOST', 'localhost');
    define('DB_PORT', '3307');
    define('DB_NAME', 'blue');
    define('DB_CHARSET', 'utf8mb4');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
}
define("APP_NAME", "Blueme Framework");
define("APP_DESC", "An MVC backend framework built on php");

// true means show errors, not used on live server! 
define('DEBUG', true);


// this is for the env file::
// function env($key, $default = null) {
//         $envFile = '.env';

//         if (!file_exists($envFile)) {
//             return $default;
//         } 

//         $envLines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
//         foreach( $envLines as $line ) {
//             list($envKey, $envValue) = explode("=", $line,2);
//             if( $envKey == $key ) {
//                 return trim($envValue);
//             }
//         }
//         return $default;  
// }
