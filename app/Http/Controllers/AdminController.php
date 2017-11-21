<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use DB;


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
    public function getDataCharts()
    {
      $allUsersAnswers = DB::table('user_answers')
      ->select(DB::raw('count(user_id) as count_all_user, user_answer_id'))
      ->groupBy('user_answer_id')->get()->toArray();

      $userAge = User::selectRaw('count(your_age) as count_age, your_age')
      ->groupBy('your_age')
      ->where('users.your_age', '<=', '1999-01-01')->get()->toArray();
       $array = [$allUsersAnswers,$userAge];
       return response($array);
    }
}
