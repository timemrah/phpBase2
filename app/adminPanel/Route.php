<?php
namespace app\adminPanel;
use sys\Route, sys\App;


//sub: /admin-panel
Route::get('/',         './app/adminPanel',          'index');
Route::get('/dashboard','./app/adminPanel/dashboard','index');

Route::sub('/profile',  './app/adminPanel/profile');
Route::sub('/user',     './app/adminPanel/user');


//HİÇ BİR ROTA ÇALIŞMADIYSA 404 VERELİM
App::run('./app/error','_404_');