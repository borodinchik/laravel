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
// Route::get('/home', 'HomeController@index')->name('home');
//Admin Routes
Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::post('/questions', 'QuestionController@store');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/all_users', 'AdminController@showAllUsers')->name('show.all.users');
    Route::get('/all_questions', 'AdminController@indexQuestionsList')->name('all-questions');
    Route::delete('/{id}', 'AdminController@destroy')->name('delete.question');
  });
//Questions Routes
Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
    Route::post('/{id}', 'UserController@show')->name('show.question');
    Route::post('/', 'UserController@sendFormAnswer');
});
Route::get('/column', 'AnswerController@getAnswer');//этот роут передает данные опросов юзеров в график
