<?php 

date_default_timezone_set('Asia/Manila');
session_start();

require_once "dbConfig.php";

// Autoload classes
spl_autoload_register(function($className) {
    $path = "classes/";
    $extension = ".php";
    $fullPath = $path.$className.$extension;

    require_once $fullPath;
});

$userObj = new User($conn);
