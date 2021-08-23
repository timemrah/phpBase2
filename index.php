<?php

use sys\App, sys\Route;

//SYS INCLUDE:
require './sys/tool.php';
//require './sys/Route.php'; //Autoload
//require './sys/App.php';   //Autoload

//VIEW INCLUDE:
require './layout/View.php';

//DEFINES:
define('HOST_DIR', getHostDir());
define('BASE_URL', getBaseURL());
define('BASE',     getBase());
define('CONFIG',   require './sys/config.php');

//REDIRECT TO SSL ADDRESS IF NECESSARY
if(CONFIG['ssl'] && $_SERVER['REQUEST_SCHEME'] === 'http'){
    redirectSSL();
    exit();
} else if(!CONFIG['ssl'] && $_SERVER['REQUEST_SCHEME'] === 'https'){
    redirectNoSSL();
    exit();
}

//AUTOLOAD CLASS
spl_autoload_register(function($class){
    $dir = ns2dir($class);
    require_once "./{$dir}.php";
});

//RUN ROUTE:
Route::sub(null, './app');