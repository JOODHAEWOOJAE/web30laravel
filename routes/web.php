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

Route::get('/', IndexController::class)->name('Index');

Route::get('/about', 'SimplePageController@about')->name('about');

Route::get('/services', 'SimplePageController@services')->name('services');

Route::get('/contacts', ContactsController::class)->name('contacts');

Route::get('/author/{key}', PostByAuthorController::class)->name('post_by_author');

Route::get('/post/{id}', SinglePostController::class)->name('single_post');

Route::post('/post/{id}', SaveCommentController::class)->name('save_comment');

Route::get('/category/{key}', PostsByCategoryController::class)->name('post_by_category');

// ADMIN
Route::get('/admin/add_post', 'AdminPostsController@add')->name('add_post_get');

Route::post('/admin/add_post', 'AdminPostsController@save')->name('add_post_post');

// AUTH
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
