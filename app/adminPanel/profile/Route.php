<?php
namespace app\adminPanel\profile;
use sys\Route, sys\App;

//sub: /admin-panel/profile
Route::get('/',      null, 'index');
Route::put('/edit',  __NAMESPACE__, 'edit');
Route::del('/delete',__NAMESPACE__, 'delete');


//HİÇ BİR ROTA ÇALIŞMADIYSA 404 VERELİM
App::run('./app/error','_404_');