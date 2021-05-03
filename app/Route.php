<?php
namespace app;
use sys\Route, sys\App;


Route::get('/','./app/frontFace','index');
Route::sub('GET','/admin-panel','./app/adminPanel');
Route::sub('GET','/user-panel', './app/userPanel');


//HİÇ BİR ROTA ÇALIŞMADIYSA 404 VERELİM
App::run('./app/error','_404_');