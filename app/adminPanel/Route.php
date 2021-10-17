<?php
namespace app\adminPanel;
use sys\Route, sys\App;
//sub: url='/admin-panel' dir='./app/adminPanel'


//CONTROLLER ÇALIŞTIR
Route::get('/','index');
Route::get('/dashboard','dashboard');

//ALT ROTA GURUBUNU ÇAĞIR
Route::sub('/profile',  '/profile');
Route::sub('/user',     '/user');