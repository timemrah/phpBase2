<?php
namespace app\adminPanel;
use sys\Route, sys\App;
//sub: url='/admin-panel' dir='./app/adminPanel'


//CONTROLLER ÇALIŞTIR
Route::get('/asd','dashboard');
Route::get(null,'index');

//ALT ROTA GURUBUNU ÇAĞIR
Route::sub('/profile',  '/profile');
Route::sub('/user',     '/user');