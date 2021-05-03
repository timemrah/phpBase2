<?php
namespace app\adminPanel;
use sys\Route, sys\App;


//sub: /admin-panel
Route::any('/',         './app/adminPanel',          'index');
Route::any('/dashboard','./app/adminPanel/dashboard','index');
Route::any('/profile',  './app/adminPanel/profile',  'index');


//HİÇ BİR ROTA ÇALIŞMADIYSA 404 VERELİM
App::run('./app/error','_404_');