<?php

Auth::routes();

// user
Route::group(['namespace' => 'User'], function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('profile/{id}', 'UserController@profile')->name('profile');
	Route::post('/classes/store', 'BookingController@saveClass')->middleware('auth')->name('save.classes');
	Route::get('/calendar', 'CalendarController@index')->name('calendar.index');
	Route::put('/calendar', 'CalendarController@update')->name('calendar.update');
	Route::get('class/student', 'BookingController@getListClassByStudentId');
});

//Admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'check.admin']], function () {
	Route::get('/', 'AdminController@index');
});

