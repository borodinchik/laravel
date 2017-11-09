<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserAnswerRequest;
use App\UserAnswers;
use App\UserResponseOption;
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
      $questions= Question::get();
          return view('users.index', compact('questions'));
        }

public function show($id)
 {
   $question= Question::with(['answer'])->where('id', '=' ,$id)->first();
          return view('users.show', compact('question'));
 }
public function storeUserAnswer(UserAnswerRequest $request)
{//Добавляем ответ юзера в базу данных в таблицу answers
      $userAnswer = new UserAnswers();
      $userAnswer->user_answer = $request['user_answer'];
      // dd($userAnswer->toArray());
      $userAnswer->save();
        return redirect()->back();

}


      }
