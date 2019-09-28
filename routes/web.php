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

// Login User
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::post('user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('auth/{provider}', 'Auth\SocialiteController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialiteController@handleProviderCallback');

// Login Admin
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

// Backend
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    // Setting Tentang Kami Admin
    Route::resource('tentangkami', 'AboutController', ['except' => ['create', 'store', 'destroy']]);

    // Pesan Admin
    Route::resource('pesan', 'MessagesController');
    Route::post('pesan/kirim-email', 'MessagesController@sendEmail')->name('pesan.email');

    // Artikel Admin
    Route::get('artikel/trash', 'PostsController@trash')->name('artikel.trash');
    Route::get('artikel/{id}/restore', 'PostsController@restore')->name('artikel.restore');
    Route::delete('artikel/{id}/delete-permanent', 'PostsController@deletePermanent')->name('artikel.delete-permanent');
    Route::resource('artikel', 'PostsController');

    // User Admin
    Route::get('user-admin/trash', 'userAdminsController@trash')->name('user-admin.trash');
    Route::get('user-admin/{id}/restore', 'userAdminsController@restore')->name('user-admin.restore');
    Route::delete('user-admin/{id}/delete-permanent', 'userAdminsController@deletePermanent')->name('user-admin.delete-permanent');
    Route::resource('user-admin', 'UserAdminsController');

    // User Web
    Route::get('user/trash', 'UsersController@trash')->name('user.trash');
    Route::get('user/{id}/restore', 'UsersController@restore')->name('user.restore');
    Route::delete('user/{id}/delete-permanent', 'UsersController@deletePermanent')->name('user.delete-permanent');
    Route::resource('user', 'UsersController', ['except' => ['create', 'store']]);

    // kategori Artikel
    Route::get('kategori-artikel/trash', 'CategoriesController@trash')->name('kategori-artikel.trash');
    Route::get('kategori-artikel/{id}/restore', 'CategoriesController@restore')->name('kategori-artikel.restore');
    Route::delete('kategori-artikel/{id}/delete-permanent', 'CategoriesController@deletePermanent')->name('kategori-artikel.delete-permanent');
    Route::resource('kategori-artikel', 'CategoriesController', ['except' => ['show']]);

    // Setting Footer Admin
    Route::get('pengaturan', 'SettingsController@index')->name('pengaturan.index');
    Route::post('pengaturan', 'SettingsController@store')->name('pengaturan.store');

    // Komentar
    Route::get('/komentar', 'CommentsController@index')->name('komentar.index');
    Route::get('/komentar/{id}', 'CommentsController@show')->name('komentar.show');
    Route::delete('/komentar/{id}', 'CommentsController@destroy')->name('komentar.destroy');

});

// Frontend/Root
Route::get('/', 'IndexController@index')->name('index');

//Blog
Route::get('artikel', 'IndexController@blog')->name('artikel');

//Kategori List
Route::get('kategori-list', 'IndexController@categories')->name('kategori-list');

// Tentang Kami
Route::get('tentang-kami', 'IndexController@about')->name('tentang-kami');

// Contact
Route::get('kontak-kami', 'IndexController@contact')->name('kontak-kami.index');
Route::post('kontak-kami', 'IndexController@contactStore')->name('kontak-kami.store');

// Route Model Binding Kategori/Slug
Route::get('/{categorie}', 'IndexController@getPostByCategorySlug');
Route::get('/{categorie}/{slug}', 'IndexController@single');

Route::post('/{categorie}/{slug}/komentar', 'IndexController@comment')->name('post.comment');
Route::get('/search', 'IndexController@blogSearch');
