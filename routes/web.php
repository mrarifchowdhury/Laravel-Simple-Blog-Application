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


Route::get('/', 'BlogController@index');

Auth::routes();

Route::get('/Dashboard', 'DashboardController@index')->name('Dashboard');
Route::get('/all-blogs', 'DashboardController@allblogs')->name('allblogs');


Route::get('/blog-details/{id}', 'BlogController@eachBlogDetails')->name('blogdetails');


Route::Resource('blog','BlogController');


Route::get('/blogs/add', 'BlogController@addform')->name('addblogs');

 
// Route::post('/blogs/insert', 'BlogController@insertform');


// Route::get('/blogs/view', 'BlogController@view');

// Route::post('/blogs/{$id}/edit', 'BlogController@edit')->name('blogs_edit');
