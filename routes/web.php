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
use App\Task;

use App\Post;

Route::get('/blog','PostController@index')->name('home');

Route::get('/blog/{posts}','PostController@show');

Route::get('/posts/create', 'PostController@create');

Route::post('/posts/{post}/comments', 'CommentController@store');

Route::post('/posts', 'PostController@store');



// Registration Route

Route::get('/register','RegistrationController@create');

Route::post('/register/user','RegistrationController@store');

Route::get('/login','SessionController@create');


// Route::get('/', 'TaskController@general');

// Route::get('/about', 'TaskController@general');

// Route::get('/tasks', 'TaskController@index');

// Route::get('/tasks/{task}', 'TaskController@show');



