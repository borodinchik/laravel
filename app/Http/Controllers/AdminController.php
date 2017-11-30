
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;
use App\Question;
use App\User;
use App\Answer;
use App\UserAnswers;
use Carbon\Carbon;
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
    public function getDataCharts($id)
    {
      $getAnswersQuestions = Question::with(['answer'])
      ->where('id', '='  ,$id)->first();

      $countUser = UserAnswers::selectRaw('count(user_id) as count_all_user, user_answer_id')
      ->groupBy('user_answer_id')->get();

      $genderMan = User::selectRaw('count(gender) as count_gender_man')
      ->where('gender', 'Man')->get();

      $genderWomen = User::selectRaw('count(gender) as count_gender_women')
      ->where('gender', 'Women')->get();

      $adultAgeUser = User::where('your_age', '<=', '1999-01-01')
      ->selectRaw('count(your_age) as count_adult_age_user')->get();

      // dd($genderWomen->toArray(),$genderMan->toArray(),$adultAge->toArray());

      return response()->json([
        $getAnswersQuestions,
        $countUser,
        $adultAgeUser,
        $genderMan,
        $genderWomen,

    ],200)->header('Content-Type', 'application/json');
    }
}
