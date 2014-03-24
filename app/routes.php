<?php
//language-----------------------------------------------------------------------------------------
Route::get("lang/{lang}", function($lang)
{
	$cookie = Cookie::forever('lang', $lang);
	(Session::get('redir_url'))? $url = Session::get('redir_url') : $url = "/";
	return Redirect::to($url)->withCookie($cookie);
});
//------------------------------------------------------------------------------------------------


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
Route::get('course/{code}', 'CourseController@Course');
Route::get('agreement/{code}', 'CourseController@Agreement');
Route::get('inclass/{code}', 'CourseController@Inclass');
Route::get('inclass/{code}/awritten', 'CourseController@Awritten'); // awitten = written assignments
Route::get('inclass/{code}/aprogramming', 'CourseController@Aprogramming'); // aprogramming = programming assignments
Route::get('inclass/{code}/aquizes', 'CourseController@Aquizes'); // aquizes = quizes
Route::get('inclass/{code}/aexams', 'CourseController@Aexams'); // aexams = exams
Route::get('inclass/{code}/video', 'CourseController@Video'); 
Route::get('inclass/{code}/reading', 'CourseController@Reading'); // areading = reading assignments
//----------------------------------------------------

// faculty routes--------------------------------------
Route::get('faculties', 'FacultyController@Faculties');
Route::get('faculty/{name}', 'FacultyController@Faculty');
//----------------------------------------------------

// faculty routes--------------------------------------
Route::get('departments', 'DepartmentController@Departments');
Route::get('department/{name}', 'DepartmentController@Department');
//----------------------------------------------------