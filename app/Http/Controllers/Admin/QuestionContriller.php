<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionsRequest;
use App\UserAnswers;
use App\Question;
use App\Answer;
use App\User;

class QuestionContriller extends Controller
{
  public function __construct()
  {
    //$this->middleware('auth:admin');
  }
/*Подтягиваем вьюху главной страници админа*/
  public function index(Question $question)
  {
    $question = $question->all();
    return view('admins.admin', compact('$question'));
  }
/*Выводим список всех вопросов для Админа*/
  public function questionsList(Question $questions)
  {
    $questions = $questions->all();
    return view('admins.index', compact('questions'));
  }
/*Админ может удалять вопросы*/
  public function destroyQuestion($id)
  {
    $question = Question::with(['answer'])->where('id', '=', $id );
    $question->delete();
    return redirect()->back();
  }
  public function store(QuestionsRequest $request)
  {
    //Админ добовляет новый опрос для юзеров
    $question = new Question();
    $question->title = $request['title'];
    $question->body = $request['body'];
    $question->save();

  foreach ($request->input('answer') as $answer)
  {
    $newAnswer = new Answer();
    $newAnswer->question_id = $question->id;
    $newAnswer->answer = $answer;
    $newAnswer->save();
  }
  return redirect()->back();
    }
  public function getAdminCharts($id)
  {

    // $data = Carbon::now()->subYear(18);
    //
    //  $data->year;
    // dd($data);

    $getAnswersQuestions = Question::with(['answer'])
    ->where('id', '='  ,$id)->first();

    $countUser = UserAnswers::selectRaw('count(user_id) as count_all_user, user_answer_id')
    ->groupBy('user_answer_id')->get();

    $genderMan = User::selectRaw('count(gender) as count_gender_man')
    ->where('gender', 'Man')->get();

    $genderWomen = User::selectRaw('count(gender) as count_gender_women')
    ->where('gender', 'Women')->get();

    $adultAge = User::where('your_age', '<=', '1999-01-01')
    ->selectRaw('count(your_age) as count_adult_age_user')->get();

    $imperfectAge = User::where('your_age', '>', '1999-01-01')
    ->selectRaw('count(your_age) as count_imperfect_age_user')->get();
// dd($imperfectAge->toArray());
        // dd($genderWomen->toArray(),$genderMan->toArray(),$adultAge->toArray(),$countUser->toArray(),$imperfectAge->toArray());

        return response()->json([
          $getAnswersQuestions,
          $countUser,
          $adultAge,
          $genderMan,
          $genderWomen,
  ],200)->header('Content-Type', 'application/json');
  }

}
