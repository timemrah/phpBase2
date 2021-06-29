<?php
namespace app\adminPanel\user;
use sys\Route, sys\App;
//sub: url='/admin-panel/user' dir='./app/adminPanel/user'


//CONTROLLER ÇALIŞTIR
Route::get ('/',      'index');
Route::get ('/detail','detail');
Route::post('/','create');
Route::put ('/','update');
Route::del ('/','delete');


//HİÇ BİR ROTA ÇALIŞMADIYSA 404 VERELİM
App::run('./app/error','_404_');