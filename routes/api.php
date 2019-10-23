<?php

use Illuminate\Http\Request;
Use App\Post;
Use App\Schedule;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('posts', 'PostController@index');
    Route::get('post/{post}', 'PostController@show');
    Route::post('post', 'PostController@store');
    Route::put('post/{post}', 'PostController@update');
    Route::delete('post/{post}', 'PostController@delete');
//    name = nume grupa, nume profesor | week = saptamina | type: g = group, t = teacher

});
Route::get('groupSchedule/name/{name}/week/{week}/type/{type}', 'ScheduleController@getSchedule', ['middleware' => 'cors',function(){
    return ['status'=>'success'];
}]);
Route::get('names', 'ScheduleController@getAll', ['middleware' => 'cors',function(){
    return ['status'=>'success'];
}]);
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
