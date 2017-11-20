<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;
use App\Http\Requests\UserAnswerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\UserAnswers;
use App\Question;
use App\Answer;



class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  //Вытягиваем весь сисок опросов
public function index()
{
    $questions = Question::get();
    return view('users.index', compact('questions'));
}

public function show($id)
 {
   $question = Question::with(['answer'])->where('id', '=' ,$id)->first();
   return view('users.show', compact('question'));
 }

 //Добовляем в базу ответ юзера , id юзера , id вопроса
 public function store(UserAnswerRequest $request)
 {
   $createNewAnswer = new UserAnswers();
   $createNewAnswer->user_answer_id = $request['user_answer_id'];
   $createNewAnswer->user_id = Auth::user()->id;
   $createNewAnswer->question_id = 1;//передать id вопроса на который был дан ответ
   dd($createNewAnswer->toArray());
  //  $createNewAnswer->save();

  // return redirect('user');
// }

 }}
