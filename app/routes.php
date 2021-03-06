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

/// admin routes------------------------------------------------------------------------------------
Route::get ('login' ,   'AdminController@Login');
Route::post('login' ,   'AdminController@postLogin');
Route::post('logout',   'AdminController@postLogout');
Route::get ('reminder', 'AdminController@Reminder');
Route::post('reminder', 'AdminController@postReminder');
Route::get ('reset/{kimlik}/{reminder_token}', 'AdminController@Reset');
//-------------------------------------------------------------------------------------------------

// user routes----------------------------------------
//Route::get('teachers'	   , 'UserController@Teachers');
Route::get ('people/{person}',  ['as' => 'department-person', 'uses' => 'UserController@PersonAll']);
Route::get ('user/{id}/profile', 'UserController@User');
Route::get ('user/{id}/edit', 	 'UserController@EditUser');
Route::post('user/{id}/edit', 	 'UserController@UpdateUser');
Route::get ('user/{id}/picture', 'UserController@UserPicture');
Route::post('user/{id}/picture', 'UserController@UpdateUserPicture');
	
Route::get ('user/{id}/editpass', 'UserController@PasswordChange');
Route::post('user/{id}/editpass', 'UserController@PostPasswordChange');

Route::get('mycourses/{id}', 'UserController@Mycourses');
//----------------------------------------------------

// course routes--------------------------------------
Route::get('course/courses', 'CourseController@Courses');
Route::get('course/courses/{code}', 'CourseController@Course');
Route::get('agreement/courses/{code}', 'CourseController@Agreement');
Route::post('agreement/courses/{code}', 'CourseController@AgreementPost');
Route::get('inclass/{code}/agreementreminder', 'CourseController@Agreementreminder');
Route::get('inclass/{code}', 'CourseController@Inclass');
Route::get('inclass/{code}/awritten', 'CourseController@Awritten'); // awitten = written assignments
Route::get('inclass/{code}/aprogramming', 'CourseController@Aprogramming'); // aprogramming = programming assignments
Route::get('inclass/{code}/aquizes', 'CourseController@Aquizes'); // aquizes = quizes
Route::get('inclass/{code}/aexams', 'CourseController@Aexams'); // aexams = exams
Route::get('inclass/{code}/video', 'CourseController@Video'); 
Route::get('inclass/{code}/reading', 'CourseController@Reading'); // areading = reading assignments
Route::get('course/{code}/readings', 'CourseController@Readinginfo'); // reading info = readings in dbp
Route::get('course/{code}/objectives', 'CourseController@Objectives'); // reading info = readings in dbp
Route::get('course/{code}/weeklyplan', 'CourseController@Weeklyplan'); // reading info = readings in dbp
Route::get('course/{code}/evaluations', 'CourseController@Evaluations'); // reading info = readings in dbp
Route::get('course/{code}/links', 'CourseController@Links'); // reading info = readings in dbp

//----------------------------------------------------

// course routes--------------------------------------
Route::get('/academic/academic', 'HomeController@ListDeps');
//----------------------------------------------------

// course routes--------------------------------------
	Route::get ('page/{page}', 		 'HomeController@Page');
	Route::get ('page/{page}/edit',   'HomeController@EditPage');
	Route::post('page/{page}/edit',   'HomeController@UpdatePage');
	Route::get ('page/{page}/create', 'HomeController@NewPage');
	Route::post('page/{page}/create', 'HomeController@CreatePage');

//----------------------------------------------------

// faculty routes--------------------------------------
Route::get('faculties', 'FacultyController@Faculties');
Route::get('faculty/{name}', 'FacultyController@Faculty');
//----------------------------------------------------

// dep routes--------------------------------------
Route::get('departments', 'DepartmentController@Departments');
Route::get('department/{name}', 'DepartmentController@Department');

Route::get('departments', 'DepartmentController@ListDeps');
Route::get('department', 'DepartmentController@ListDeps');
//----------------------------------------------------

// news routes--------------------------------------
Route::get('/news',              'NewsController@AllNews');
Route::get('/news/create',       'NewsController@NewNews');
Route::post('/news/create',      'NewsController@CreateNews');
Route::get('/news/{id}',         'NewsController@Info');
Route::get('/news/{id}',         'NewsController@News');
Route::get('/news/{id}/edit',    'NewsController@EditNews');
Route::post('/news/{id}/edit',   'NewsController@UpdateNews');
Route::post('/news/{id}/delete', 'NewsController@DeleteNews');
//----------------------------------------------------

// pics routes--------------------------------------
Route::get ('/picture/list',             'FilesController@ListPics');
Route::get ('/picture/create',           'FilesController@CreatePicture');
Route::post('/picture/create',           'FilesController@StorePicture');
Route::get ('/picture/{picname}',        'FilesController@Picture');
Route::post('/picture/{picname}/update', 'FilesController@UpdatePicture');
Route::post('/picture/{picname}/delete', 'FilesController@DeletePicture');
//----------------------------------------------------

// files routes--------------------------------------
Route::get ('/file/list',              'FilesController@ListFiles');
Route::get ('/file/create',            'FilesController@CreateFile');
Route::post('/file/create',            'FilesController@StoreFile');
Route::get ('/file/{filename}',        'FilesController@File');
Route::post('/file/{filename}/update', 'FilesController@UpdateFile');
Route::post('/file/{filename}/delete', 'FilesController@DeleteFile');

//----------------------------------------------------
