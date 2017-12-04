<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Concerns\QueriesRelationships;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAnswerRequest;
use App\Question;
use App\UserAnswers;
use App\Answer;
class QuestionContriller extends Controller
{
  use QueriesRelationships;
  public function __consruct()
  {
    $this->middleware('auth');
  }
  public function index(Question $questions)
  {
    $questions = $questions->all();
    return view('questions.index', compact('questions'));
  }
  public function showQuestionsUser(Question $questions)
  {
    $questions = $questions->get();
    return view('users.index', compact('questions'));
  }
  public function show($id)
  {
    $question = Question::with(['answer'])->where('id', '=' ,$id)->first();
    return response('OK', 200);
  }
  public function store(UserAnswerRequest $request)
 {
   $createNewAnswer = new UserAnswers();
   $createNewAnswer->user_answer_id = $request['answer_id'];
   $createNewAnswer->user_id = Auth::user()->id;
  //  $question_id = Answer::where('id', $request['user_answer_id'])->first();
  //  $createNewAnswer->question_id = $question_id->question_id;
   $createNewAnswer->save();
   return response('OK',200);
 }
 public function test()
 {

 $test = \App\UserAnswers::find(1);
 $user = \App\User::find(1);
 $someTest2 = $user->dropAnswer();
 // $someTest2 = $user->dropAnswer()->with(1)->join('user_answers','user_answers.user_id', '=', 'user.id');
 dd($someTest2);
 // {
 //   $drop = \App\UserAnswers::whereHas('answers', function ($query) {
 //     $query->where('user_id', '=',  '1');
 // })->get();
 }
}
