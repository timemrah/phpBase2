<?php

use sys\App;
use sys\Route;

//SYS INCLUDE:
require './sys/tool.php';
require './sys/Route.php';
require './sys/App.php';

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
}

//RUN ROUTE:
Route::sub(null, './app');