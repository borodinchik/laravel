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



Auth::routes();
Route::get('/', function()
{
  return redirect('login');
});


Route::get('/home', 'HomeController@index')->name('home');
//Admin Routes
Route::prefix('admin')->group(function(){
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/all_users', 'AdminController@showAllUsers')->name('show.all.users');
  Route::get('/all_questions', 'AdminController@indexQuestionsList');

  Route::delete('/{id}', 'AdminController@destroy')->name('delete.question');

  // Route::get('/', 'AdminController@show')->name('get.question');



});
//Questions Routes
Route::prefix('questions')->group(function(){
  // Route::get('/', 'QuestionController@index');
  Route::post('/', 'QuestionController@store');
  // Route::get('/{questions}', 'QuestionController@show')->name('get.question');
  // Route::delete('/{questions}', 'QuestionController@destroy')->name('delete.question');



});
