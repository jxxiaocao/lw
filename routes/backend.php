<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('backend/login','Backend\LoginController@Login');
///,['middleware' => ['AdminSession']]
Route::group(array('prefix'=>'backend','namespace'=>'Backend','middleware' =>'AdminSession'),function()
{
    Route::get('index','IndexController@Index');
    Route::get('main','IndexController@Main');
});


