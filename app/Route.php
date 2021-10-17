<?php namespace app;
use sys\Route, sys\App;


//CONTROLLER ÇALIŞTIR
Route::get('/','index', '/frontFace');
Route::get('/hakkimizda','about', '/frontFace');


//ALT ROTA GURUBUNU ÇAĞIR
Route::sub('/base-panel', '/basePanel');
Route::sub('/admin-panel','/adminPanel');

//HİÇ BİR ROTA ÇALIŞMADIYSA 404 VERELİM
App::run('./app/error','_404_');