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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');

    Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset')->name('admin.password.update');
});

Route::get('auth/{provider}', 'Auth\SocialiteController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialiteController@handleProviderCallback');

// User Web
Route::get('users/trash', 'UsersController@trash')->name('users.trash');
Route::get('users/{id}/restore', 'UsersController@restore')->name('users.restore');
Route::delete('users/{id}/delete-permanent', 'UsersController@deletePermanent')->name('users.delete-permanent');
Route::resource('users', 'UsersController', ['except' => ['create', 'store']]);

// User Admin
Route::get('useradmin/trash', 'userAdminsController@trash')->name('useradmin.trash');
Route::get('useradmin/{id}/restore', 'userAdminsController@restore')->name('useradmin.restore');
Route::delete('useradmin/{id}/delete-permanent', 'userAdminsController@deletePermanent')->name('useradmin.delete-permanent');
Route::resource('useradmin', 'UserAdminsController');
