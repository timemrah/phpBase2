<?php
namespace app\adminPanel;
use sys\Route, sys\App;
//sub: url='/admin-panel' dir='./app/adminPanel'


//CONTROLLER ÇALIŞTIR
Route::get('/','index');

//ALT ROTA GURUBUNU ÇAĞIR
Route::sub('/profile',  '/profile');
Route::sub('/user',     '/user');


//HİÇ BİR ROTA ÇALIŞMADIYSA 404 VERELİM
App::run('./app/error','_404_');