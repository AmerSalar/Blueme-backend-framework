<?php
defined('ROOTPATH') OR exit("Access denied!");
checkExtensions();
function checkExtensions() {
    $requiredExtensions = [
        'mysqli',
        'curl',
        'fileinfo',
        'pdo_mysql',
        'exif',
        'mbstring'
    ];

    $notLoaded = [];

    foreach($requiredExtensions as $ext) {
        // this v is a php function to check extension is loaded or no
        if(!extension_loaded($ext)) {
            $notLoaded[] = $ext;
        }
    }

    if(!empty($notLoaded)) {
        show("Please load the following extensions in your php.ini file: <br>".
        implode("<br>", $notLoaded));
        die();
    }
}
function show($item) {
    echo "<pre>";
    print_r($item);
    echo "</pre>";
}
function esc($str) {
    return htmlspecialchars($str);
}