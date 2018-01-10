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



Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    /*User management*/
    Route::get('user/list', 'Client\UserController@getList');

    Route::any('user/add', 'Client\UserController@add');

    Route::any('user/delete', 'Client\UserController@delete');

    Route::any('user/update', 'Client\UserController@update');

    /*Person management*/
    Route::get('person/list', 'Person\PersonController@getList');

    Route::any('person/add', 'Person\PersonController@add');

    Route::any('person/delete', 'Person\PersonController@delete');

    Route::any('person/update', 'Person\PersonController@update');

    /*Company management*/
    Route::get('company/list', 'Company\CompanyController@getList');

    Route::any('company/add', 'Company\CompanyController@add');

    Route::any('company/delete', 'Company\CompanyController@delete');

    Route::any('company/update', 'Company\CompanyController@update');

    /*Project management*/
    Route::get('project/list', 'Project\ProjectController@getList');

    Route::any('project/add', 'Project\ProjectController@add');

    Route::any('project/delete', 'Project\ProjectController@delete');

    Route::any('project/update', 'Project\ProjectController@update');

    /*Period management*/
    Route::get('period/list', 'Period\PeriodController@getList');

    Route::any('period/add', 'Period\PeriodController@add');

    Route::any('period/delete', 'Period\PeriodController@delete');

    Route::any('period/update', 'Period\PeriodController@update');

    /*Applications management*/
    Route::get('applications/list', 'Applications\ApplicationsController@getList');

    Route::any('applications/add', 'Applications\ApplicationsController@add');

    Route::any('applications/delete', 'Applications\ApplicationsController@delete');

    Route::any('applications/update', 'Applications\ApplicationsController@update');

    /*Positions management*/
    Route::get('positions/list', 'Positions\PositionsController@getList');

    Route::any('positions/add', 'Positions\PositionsController@add');

    Route::any('positions/delete', 'Positions\PositionsController@delete');

    Route::any('positions/update', 'Positions\PositionsController@update');
});