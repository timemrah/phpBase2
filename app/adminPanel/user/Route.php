<?php
namespace app\adminPanel\user;
use sys\Route, sys\App;
//sub: url='/admin-panel/user' dir='./app/adminPanel/user'


//appDir null ise
Route::get ('/',      'index');
Route::get ('/detail','detail');
Route::post('/create','create');
Route::put ('/update','update');
Route::del ('/delete','delete');


//HİÇ BİR ROTA ÇALIŞMADIYSA 404 VERELİM
App::run('./app/error','_404_');