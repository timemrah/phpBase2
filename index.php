<?php

use sys\App, sys\Route;

//SYS INCLUDE:
require './sys/tool.php';

//DEFINES:
define('HOST_DIR', getHostDir());
define('BASE_URL', getBaseURL());
define('BASE',     getBase());
define('CONFIG',   require './sys/config.php');

/*prePrint([
    'URL' => getURL(),
    'REQUEST_URI' => $_SERVER['REQUEST_URI'],
    'HOST_DIR' => HOST_DIR,
    'BASE_URL' => BASE_URL,
    'BASE'     => BASE
]);*/

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
Route::sub('/', './app');
// url'ye yazılan '/' içeride null değere çevriliyor. Globalde hep bu şekilde gösterildiği için '/' kullanıyoruz.