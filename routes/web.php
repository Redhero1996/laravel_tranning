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

Route::view('/', 'home');
Route::view('/about', 'about');

Route::view('/contact', 'tickets.create');
Route::post('/contact', 'TicketsController@store');

Route::get('/tickets', 'TicketsController@index')->name('tickets.index');
Route::get('/tickets/{slug}', 'TicketsController@show')->name('tickets.show');
Route::get('/tickets/{slug}/edit', 'TicketsController@edit')->name('tickets.edit');
Route::post('/tickets/{slug}', 'TicketsController@update')->name('tickets.update');
Route::post('/tickets/{slug}/delete', 'TicketsController@destroy')->name('tickets.destroy');

Route::post('/comment', 'CommentController@newComment');

Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('users/register', 'Auth\RegisterController@register');
Route::get('users/logout', 'Auth\LoginController@logout');
Route::get('users/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('users/login', 'Auth\LoginController@login');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'], function () {
	Route::get('/', 'PagesController@home');

	Route::get('users', 'UsersController@index')->name('admin.user.index');
	Route::get('users/{id?}/edit', 'UsersController@edit')->name('admin.user.edit');
	Route::post('users/{id?}/edit', 'UsersController@update');

	Route::get('roles', 'RolesController@index')->name('admin.roles.index');
	Route::get('roles/create', 'RolesController@create')->name('admin.roles.create');
	Route::post('roles/create', 'RolesController@store');

	// Route::resource('posts', 'PostsController');
	Route::get('posts', 'PostsController@index')->name('posts.index');
	Route::get('posts/create', 'PostsController@create')->name('posts.create');
	Route::post('posts/create', 'PostsController@store');
	Route::get('posts/{id?}/edit', 'PostsController@edit')->name('posts.edit');
	Route::post('posts/{id?}/edit','PostsController@update');

	Route::get('categories', 'CategoriesController@index')->name('categories.index');
	Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
	Route::post('categories/create', 'CategoriesController@store');

});

Route::get('blog', 'BlogController@index');
Route::get('blog/{slug?}', 'BlogController@show')->name('blog.show');

