<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserAnswerRequest;
use App\UserAnswers;
use App\Question;
use App\Answer;

class UserController extends Controller
{
  //Вытягиваем весь сисок опросов
    public function index()
    {
      $questions= Question::get();
      // dd($questions->toArray());
      return view('users.index', compact('questions'));
    }
    public function show($id)
    {
      $questions= Question::with(['answer'])->where('id', '=' ,$id)->first();
          return view('users.show', compact('questions'));
          // dd($questions->toArray());

  }


}
