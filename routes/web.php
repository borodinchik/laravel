<?php
Auth::routes();

Route::get('/', function()
{
  return redirect('login');
});
/*
Admin Route
*/
Route::group(['prefix' => 'admin', 'middleware' => ['admin']],function(){
    Route::get('/', 'Admin\QuestionController@index')->name('admin.dashboard');
    Route::post('/questions', 'Admin\QuestionController@store');
    Route::get('/all_users', 'Admin\UserListsController@showAllUsers')->name('show.all.users');

    Route::get('/all_questions', 'Admin\QuestionController@QuestionsList')->name('all-questions');
    Route::get('/column/{id}', 'Admin\QuestionController@getAdminCharts');
    Route::delete('/{id}', 'Admin\QuestionController@destroyQuestion')->name('delete.question');
});
// Route::get();
/*
 User Route
*/
Route::prefix('user')->group(function() {
    Route::get('/', 'User\QuestionController@QuestionsUser');
    Route::post('/store', 'User\QuestionController@store')->name('save.answer.user');
    Route::post('/{id}', 'User\QuestionController@show')->name('show.question');
  });
