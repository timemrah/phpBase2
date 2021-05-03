<?php
namespace sys;
use sys\Route;


require './sys/tool.php';
require './sys/Route.php';
require './sys/App.php';


/* $requestUri_pathInfo = pathinfo($_SERVER['REQUEST_URI']);
$requestUri          = isset($requestUri_pathInfo['extension']) ? $requestUri_pathInfo['dirname'] : $_SERVER['REQUEST_URI']; */


define('HOST_DIR', pathinfo($_SERVER['PHP_SELF'])['dirname']);
define('URL',      getURL(HOST_DIR));
define("CONFIG",   require './sys/config.php');


Route::setUrl(URL);