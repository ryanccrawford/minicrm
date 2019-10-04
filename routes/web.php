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

// Index Route
Route::get('/', 'HomeController@index')->name('home');

// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Dashboard Routes
Route::get('/home', 'HomeController@index')->name('home');

// Group of Routes That Need Admin Permissions
Route::group(['middleware' => 'auth'], function () {

    // Company Logo Image upload Route
    Route::patch('companies/{company}/logo-upload', [
        'as'   => 'companies.logo-upload',
        'uses' => 'CompaniesController@logoUpload',
    ]);
    // Companies Routes as Resource
    Route::resource('companies', 'CompaniesController');
    // Employess Routes as Resourse
    Route::resource('employees', 'EmployeesController');
});
