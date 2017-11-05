<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
public function __construct()
{
    $this->middleware('auth:admin');
}
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
public function index(Question $question)
{
      $question = $question->all();
          return view('admins.admin', compact('$question'));
}
public function showAllUsers(User $users)
{
      $users = $users->all();
          return view('admins.all_users', compact('users'));
}
public function showQuestions($id)
{
      $questions = Question::with(['answer'])
          ->where('id', '='  ,$id)->first();
}
//Viev all questions from Admins !
public function indexQuestionsList(Question $questions)
{
    $questions = $questions->all();
        return view('admins.index', compact('questions'));
}
    // Delete quwestions
public function destroy($id)
{
    $question = Question::with(['answer'])->where('id', '=', $id );
    $question->delete();
        return redirect()->back();

    }
}
