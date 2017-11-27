<?php
Auth::routes();

Route::get('/', function()
{
  return redirect('login');
});
/*
Admin Route
*/
Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::post('/questions', 'QuestionController@store');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/all_users', 'AdminController@showAllUsers')->name('show.all.users');
    Route::get('/all_questions', 'AdminController@indexQuestionsList')->name('all-questions');
    Route::get('/column/{id}', 'AdminController@getDataCharts');

    Route::delete('/{id}', 'AdminController@destroy')->name('delete.question');

  });

/*
 User Route
*/
Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
    Route::post('/store', 'UserController@store')->name('save.answer.user');


    Route::post('/{id}', 'UserController@show')->name('show.question');
  });
