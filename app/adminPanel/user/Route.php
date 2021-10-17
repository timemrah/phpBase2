<?php
namespace app\adminPanel\user;
use sys\Route, sys\App;
/* subUrl: /admin-panel/user
 * subDir: ./app/adminPanel/user */


Route::get('/','index');
Route::post('/','create');
Route::put ('/','update');
Route::del ('/','delete');

Route::get ('/detail','detail');
Route::get ('/detail/set','setDetail');
Route::get ('/detail/{(int)id}','setDetail');