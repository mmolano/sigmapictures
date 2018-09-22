<?php
//------------------------------------------------------------BACKEND ROUTE----------------------------------------------------------------


//Route backend site................................

Route::get('/admin', 'AdminController@index');
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//Route Reference machine (Reference list)................................


//Route News ................................

Route::get('/all-news', 'NewsController@all_news');
Route::get('/add-news', 'NewsController@index');
Route::post('/save-news', 'NewsController@save_news');

Route::get('/edit-news/{news_id}', 'NewsController@edit_news');
Route::post('/update-news/{news_id}', 'NewsController@update_news');
Route::get('/delete-news/{news_id}', 'NewsController@delete_news');

Route::get('/unactive_news/{news_id}', 'NewsController@unactive_news');
Route::get('/active_news/{news_id}', 'NewsController@active_news');


Route::get('/add-users', 'NewsController@create');
Route::post('add-users', 'NewsController@store');


Route::get('/all-users', 'NewsController@all_users');

Route::get('/prestation_en_cours', 'PrestationController@all_prestationAdmin');

