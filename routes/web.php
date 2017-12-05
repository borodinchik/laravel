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
    Route::get('/', 'Admin\QuestionContriller@index')->name('admin.dashboard');//1
    Route::post('/questions', 'Admin\QuestionContriller@store');
    Route::get('/all_users', 'Admin\UserListsContriller@showAllUsers')->name('show.all.users');

    Route::get('/all_questions', 'Admin\QuestionContriller@QuestionsList')->name('all-questions');///2
    Route::get('/column/{id}', 'Admin\QuestionContriller@getAdminCharts');//4
    Route::delete('/{id}', 'Admin\QuestionContriller@destroyQuestion')->name('delete.question');//3
});
// Route::get();
/*
 User Route
*/
Route::prefix('user')->group(function() {
    Route::get('/', 'User\QuestionContriller@showQuestionsUser');
    Route::post('/store', 'User\QuestionContriller@store')->name('save.answer.user');
    Route::get('/store', 'User\QuestionContriller@store')->name('save.answer.user');

    Route::post('/{id}', 'User\QuestionContriller@show')->name('show.question');
  });
Route::get('/test', 'User\QuestionContriller@test');
