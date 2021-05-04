<?php

//SYS INCLUDE:
require './sys/tool.php';
require './sys/Route.php';
require './sys/App.php';

//VIEW INCLUDE:
require './layout/View.php';

//DEFINES:
define('HOST_DIR', pathinfo($_SERVER['PHP_SELF'])['dirname']);
define('URL',      getURL(HOST_DIR));
define('CONFIG',   require './sys/config.php');

//RUN ROUTE:
require './app/Route.php';