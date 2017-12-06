<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Concerns\QueriesRelationships;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAnswerRequest;
use App\Question;
use App\User;
use App\UserAnswers;
use Auth;
class QuestionController extends Controller
{
  use QueriesRelationships;
  public function __consruct()
  {
    $this->middleware('auth');
  }
  public function showQuestionsUser(Question $questions)
  {
    $usedQuestions = Auth::user()->answers->map(function ($answer) {
    return $answer->question_id;
    });
    $questions = $questions->whereNotIn('id',$usedQuestions)->get();
    // dd($questions);

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
   $createNewAnswer->answer_id = $request['answer_id'];
   $createNewAnswer->user_id = Auth::user()->id;
  //  dd($createNewAnswer);
  //  $question_id = Answer::where('id', $request['user_answer_id'])->first();
  //  $createNewAnswer->question_id = $question_id->question_id;
   $createNewAnswer->save();
   return response('OK',200);
 }
}
