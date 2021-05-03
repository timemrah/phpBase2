<?php
namespace app\adminPanel\user;
use sys\Route, sys\App;


//sub: /admin-panel/user
Route::get ('/',      __NAMESPACE__,'index');
Route::get ('/detail',__NAMESPACE__,'detail');
Route::post('/create',__NAMESPACE__,'create');
Route::put ('/update',__NAMESPACE__,'update');
Route::del ('/delete',__NAMESPACE__,'delete');


//HİÇ BİR ROTA ÇALIŞMADIYSA 404 VERELİM
App::run('./app/error','_404_');