<?php


//language-----------------------------------------------------------------------------------------
Route::get('lang/{lang}', function($lang)
{
	if(!in_array($lang, ['tr', 'kg', 'ru', 'en'])) $lang = 'kg';
	return Redirect::to( Session::get( 'prevUrl', '/' ) )->withCookie( Cookie::forever('lang', $lang) );
});
//------------------------------------------------------------------------------------------------


Route::get('/', 'HomeController@Index');
//Route::get('lang/{lang}',    'DepartmentController@Lang');

// admin routes---------------------------------------
/*Route::get ('login' , 'AdminController@Login');
Route::post('login' , 'AdminController@pLogin');
Route::post('logout', 'AdminController@pLogout');*/
//----------------------------------------------------

// user routes----------------------------------------
//Route::get('teachers'	   , 'UserController@Teachers');
Route::get ('people/{person}', ['as' => 'department-person', 'uses' => 'UserController@PersonAll']);
Route::get('user/{id}'     , 'UserController@User');
Route::get('user/{id}/edit', 'UserController@Edit');
Route::put('user/{id}/edit', 'UserController@putEdit');
Route::get('mycourses/{id}', 'UserController@Mycourses');
//----------------------------------------------------

// course routes--------------------------------------
Route::get('course/courses', 'CourseController@Courses');
Route::get('course/{code}', 'CourseController@Course');
Route::get('agreement/{code}', 'CourseController@Agreement');
Route::get('inclass/{code}/agreementreminder', 'CourseController@Agreementreminder');
Route::get('inclass/{code}', 'CourseController@Inclass');
Route::get('inclass/{code}/awritten', 'CourseController@Awritten'); // awitten = written assignments
Route::get('inclass/{code}/aprogramming', 'CourseController@Aprogramming'); // aprogramming = programming assignments
Route::get('inclass/{code}/aquizes', 'CourseController@Aquizes'); // aquizes = quizes
Route::get('inclass/{code}/aexams', 'CourseController@Aexams'); // aexams = exams
Route::get('inclass/{code}/video', 'CourseController@Video'); 
Route::get('inclass/{code}/reading', 'CourseController@Reading'); // areading = reading assignments
//----------------------------------------------------

// course routes--------------------------------------
	Route::get ('page/{page}', 		 'HomeController@Page');
	// Route::get ('page/{page}/edit',   'HomeController@EditPage');
	// Route::post('page/{page}/edit',   'HomeController@UpdatePage');
	// Route::get ('page/{page}/create', 'HomeController@NewPage');
	// Route::post('page/{page}/create', 'HomeController@CreatePage');

//----------------------------------------------------

// faculty routes--------------------------------------
Route::get('faculties', 'FacultyController@Faculties');
Route::get('faculty/{name}', 'FacultyController@Faculty');
//----------------------------------------------------

// faculty routes--------------------------------------
Route::get('departments', 'DepartmentController@Departments');
Route::get('department/{name}', 'DepartmentController@Department');

Route::get('departments', 'DepartmentController@ListDeps');
Route::get('department', 'DepartmentController@ListDeps');
//----------------------------------------------------