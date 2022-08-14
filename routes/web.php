<?php

use Illuminate\Support\Facades\Route;

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

require __DIR__ . '/auth.php';

Route::get('/', 'HomeController@home')->name('index');
Route::get('/admin/login', 'HomeController@adminLogin')->name('admin.login');
Route::get('/home', 'HomeController@home')->name('home');


// admin authenticated routes
Route::name('admin.')->prefix('admin')->namespace('Admin')->middleware('auth', 'admin')->group(function () {

	Route::get('dashboard', 'DashBoardController@index')->name('dashboard');
	Route::name('internal_maint.')->prefix('internal_maint')->group(function () {
		Route::get('list', 'InternalMaintainerContoller@index')->name('list');
		Route::get('add', 'InternalMaintainerContoller@add')->name('add');
		Route::get('edit/{id?}', 'InternalMaintainerContoller@edit')->name('edit');
		Route::post('update/{id?}', 'InternalMaintainerContoller@update')->name('update');
		Route::post('save', 'InternalMaintainerContoller@store')->name('save');
		Route::get('delete/{id?}', 'InternalMaintainerContoller@delete')->name('delete');
		Route::get('assign-job-list/{id?}','InternalMaintainerContoller@assignedList')->name('assign.job.list');
	});

	Route::name('external_maint.')->prefix('external_maint')->group(function () {
		Route::get('list', 'ExternalMaintainerContoller@index')->name('list');
		Route::get('add', 'ExternalMaintainerContoller@add')->name('add');
		Route::get('edit/{id?}', 'ExternalMaintainerContoller@edit')->name('edit');
		Route::post('update/{id?}', 'ExternalMaintainerContoller@update')->name('update');
		Route::post('save', 'ExternalMaintainerContoller@store')->name('save');
		Route::get('delete/{id?}', 'ExternalMaintainerContoller@delete')->name('delete');
		Route::get('assign-job-list/{id?}','ExternalMaintainerContoller@assignedList')->name('assign.job.list');
	});

	Route::name('unit.')->prefix('unit')->group(function () {
		Route::get('list', 'UnitController@index')->name('list');
		Route::get('add', 'UnitController@add')->name('add');
		Route::get('edit/{id?}', 'UnitController@edit')->name('edit');
		Route::post('update/{id?}', 'UnitController@update')->name('update');
		Route::post('save', 'UnitController@store')->name('save');
		Route::get('delete/{id?}', 'UnitController@delete')->name('delete');
	});

	Route::name('issues.')->prefix('issues')->group(function () {
		Route::get('issues', 'IssueController@index')->name('list');
		Route::get('add', 'IssueController@add')->name('add');
		Route::get('edit/{id?}', 'IssueController@edit')->name('edit');
		Route::post('update/{id?}', 'IssueController@update')->name('update');
		Route::post('save', 'IssueController@store')->name('save');
		Route::get('delete/{id?}', 'IssueController@delete')->name('delete');
	});

	Route::name('staff.')->prefix('staff')->group(function () {
		Route::get('issues', 'StaffController@index')->name('list');
		Route::get('add', 'StaffController@add')->name('add');
		Route::get('edit/{id?}', 'StaffController@edit')->name('edit');
		Route::post('update/{id?}', 'StaffController@update')->name('update');
		Route::post('save', 'StaffController@store')->name('save');
		Route::get('delete/{id?}', 'StaffController@delete')->name('delete');
	});

	Route::name('logged_by.')->prefix('logged_by')->group(function () {
		Route::get('issues', 'LoggedByController@index')->name('list');
		Route::get('add', 'LoggedByController@add')->name('add');
		Route::get('edit/{id?}', 'LoggedByController@edit')->name('edit');
		Route::post('update/{id?}', 'LoggedByController@update')->name('update');
		Route::post('save', 'LoggedByController@store')->name('save');
		Route::get('delete/{id?}', 'LoggedByController@delete')->name('delete');
	});

	Route::name('job.')->prefix('job')->group(function () {
		Route::get('list', 'JobController@index')->name('list');
		Route::get('add', 'JobController@add')->name('add');
		Route::post('save', 'JobController@store')->name('save');
		Route::get('edit/{id?}', 'JobController@edit')->name('edit');
		Route::post('update/{id?}', 'JobController@update')->name('update');
		Route::get('delete/{id?}', 'JobController@delete')->name('delete');
		Route::get('job-assign/{id?}', 'JobController@assignJob')->name('assign');
		Route::post('save-assign-job', 'JobController@saveAssign')->name('save.assign');
		Route::get('assigned-job', 'JobController@assigned')->name('assigned');
		Route::post('close-asisgn-job/{id?}','JobController@closeAssignJob')->name('close.assign.job');
		Route::get('open-asisgn-job/{id?}','JobController@openAssignJob')->name('open.assign.job');
		Route::get('edit-assigned-job/{id?}','JobController@editAssignedJob')->name('edit.assignJob');
		Route::post('update-assign-job/{id?}', 'JobController@updateAssignedJob')->name('update.asisgned');
		Route::get('closed-job','JobController@closed')->name('closed');
		Route::get('archive-assigned-job/{id?}','JobController@archiveJob')->name('archive.assign.job');
		Route::get('archive-list','JobController@archiveList')->name('archive');
		Route::get('delete-assigned-job/{id?}','JobController@deleteAssignJob')->name('delete.assign.job');
	});
	
	Route::get('user-profile','ProfileController@profile')->name('profile');
    Route::post('user-profile-update','ProfileController@profileUpdate')->name('profile.update');
    Route::get('user-reset-password','ProfileController@resetPassoord')->name('reset.passoword');
});

// staff authenticated routes
Route::prefix('internal')->name('internal.')->namespace('Internal')->middleware('auth', 'internal')->group(function () {
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');

	Route::name('job.')->prefix('job')->group(function () {

		Route::get('list', 'DashboardController@jobList')->name('list');
		Route::get('closed-job','DashboardController@closedJob')->name('closed');
		Route::post('hold-assign-job/{id?}', 'DashboardController@holdJob')->name('hold.assign.job');
		Route::post('close-assign-job/{id?}', 'DashboardController@closeJob')->name('close.assign.job');
		Route::get('archive-job/{id?}','DashboardController@archiveJob')->name('archive.assign.job');
		Route::get('hold-job','DashboardController@holdJobList')->name('hold');

	});

});
