<?php

//SYS INCLUDE:
require './sys/tool.php';
require './sys/Route.php';
require './sys/App.php';

//VIEW INCLUDE:
require './layout/View.php';
require './layout/View_Data.php';
require './layout/View_Data_Head.php';
require './layout/View_Data_Body.php';

//DEFINES:
define('HOST_DIR', pathinfo($_SERVER['PHP_SELF'])['dirname']);
define('URL',      getURL(HOST_DIR));
define('CONFIG',   require './sys/config.php');

//RUN ROUTE:
require './app/Route.php';