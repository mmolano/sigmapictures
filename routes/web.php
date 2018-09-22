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


//------------------------------------------------------------FRONTEND ROUTE----------------------------------------------------------------
//Route frontend site................................



        Route::get('/', function () {

            return view('admin.admin_login');

    });

Route::get('/user', function () {

    return view('user.user_login');

});

Route::get('/signin',[
    'uses'=> 'UserController@getSignin',
    'as' => 'user.user_login'
]);

Route::post('/signin', [

    'uses' => 'UserController@postSignin',
    'as' =>'user.user_login'

]);

Route::get('/user_dashboard', function () {
    return view('user.dashboard');
});

Route::get('/my_prestation', 'PrestationController@index');
Route::post('/save_prestation', 'PrestationController@save_prestation');
Route::get('/prestation_live', 'PrestationController@all_prestation');





