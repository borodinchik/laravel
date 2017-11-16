<?php
Auth::routes();

Route::get('/', function()
{
  return redirect('login');
});
//Admin Routes
Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::post('/questions', 'QuestionController@store');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/all_users', 'AdminController@showAllUsers')->name('show.all.users');
    Route::get('/all_questions', 'AdminController@indexQuestionsList')->name('all-questions');
    Route::delete('/{id}', 'AdminController@destroy')->name('delete.question');
    Route::get('/graph', 'AdminController@getDataGraph');

    //test Routes
});

//Questions Routes
Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
    // Route::get('/{id}', 'UserController@show');
    Route::post('/{id}', 'UserController@show')->name('show.question');
    Route::post('/store', 'UserController@store')->name('save.answer.user');
    // Route::post('/xuu', 'UserController@xuu');
    // Route::get('/store', 'UserController@store');

});
Route::get('/test', 'TestController@index');
Route::post('/testStore', 'TestController@store')->name('storeTest');
