<?php
namespace sys;


require './sys/tool.php';
require './sys/Route.php';
require './sys/App.php';


define('HOST_DIR', pathinfo($_SERVER['PHP_SELF'])['dirname']);
define('URL',      getURL(HOST_DIR));
define('CONFIG',   require './sys/config.php');