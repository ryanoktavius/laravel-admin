<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

route::get('/', array('as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm'));
route::post('/', 'Auth\LoginController@login');
route::post('logout', array('as' => 'logout', 'uses' => 'Auth\LoginController@logout'));

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| All the page bellow need Authenticated first ( Login Success )
|
*/
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'DashboardController@index');

    /* Testing Purpose */
    Route::get('/paging', 'TestPagging@index');
    Route::get('/paging_ajax', 'TestPagging@ajax');
    Route::get('/paging_ajax/response_ajax_advanced', 'TestPagging@response_ajax_advanced');
    
});
