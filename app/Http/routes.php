<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/admin/cms', 'UserController@index', function () {
    if (Auth::user()->level != 1)
    {
        return Redirect::to('/home');
    }
    return view('/admin/cms');
});*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@IndexLogIn');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@Home');
});

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/admin/cms', 'UserController@index');
});

/*Route::group(['middleware' => ['role:admin','web']], function () {
    Route::auth();
    Route::get('/admin/cms', 'HomeController@cms');
});*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/admin/view_user{id?}', 'UserController@view');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/admin/edit_user{id?}', 'UserController@edit');
    Route::get('/admin/edit_user{status?}', 'UserController@edit');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::post('/admin/edit_user{id?}', 'UserController@store');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/admin/delete_user{id?}', 'UserController@delete');
});
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/user/main', 'ComplaintController@index');
});
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/user/complaint', 'ComplaintController@complaint');
});
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::post('/user/complaint', 'ComplaintController@store');
});
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/admin/view_complaint{com_id?}', 'UserController@viewComplaint');
});
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::post('/admin/view_complaint', 'UserController@updateComplaint');
});
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/emails/reminders', 'UserController@viewComplaint');
});