<?php

Route::get('/', 'HomeController@Index');

// admin routes---------------------------------------
Route::get ('login' , 'AdminController@Login');
Route::post('login' , 'AdminController@pLogin');
Route::post('logout', 'AdminController@pLogout');
//----------------------------------------------------

// user routes----------------------------------------
Route::get('user/{id}'     , 'UserController@User');
Route::get('user/{id}/edit', 'UserController@Edit');
Route::put('user/{id}/edit', 'UserController@putEdit');
//----------------------------------------------------

// course routes--------------------------------------
Route::get('courses', 'CourseController@Courses');
//----------------------------------------------------