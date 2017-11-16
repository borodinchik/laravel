<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;
use App\Http\Requests\UserAnswerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\UserAnswers;
use App\Question;


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

 //Добавляем ответ юзера в базу данных в таблицу answers
public function store(UserAnswerRequest $request)
{
  // $b = "Hello World!!!";
  // // $a =  \Request::get('anton');
  // dd($b);
//   dd($request->all());

    $userAnswer = new UserAnswers();
    $userAnswer = $request->input('user_answer_id');
//     // $userAnswer->user_id = Auth::user()->id;
    dd($userAnswer);
    // $userAnswer->save();
    //   return redirect()->back();
   }

  //  public function xuu()
  //  {
  //    return \Request::get('anton');
  //    // return \Request::all();
  //    // return Input::all();
  //  }
}
