<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionsRequest;
use App\Question;
use App\Answer;
use App\User;

class QuestionContriller extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
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

    $countUser = DB::table('user_answers')
    ->select(DB::raw('count(user_id) as count_all_user, user_answer_id'))
    ->groupBy('user_answer_id')->get();

    $userAge = User::selectRaw('count(your_age) as count_age, your_age')
    ->groupBy('your_age')
    ->where('users.your_age', '<=', '1999-01-01')->get();
    dd($userAge->toArray());
  //
  //   return response()->json([
  //     $getAnswersQuestions,
  //     $countUser,
  //     $userAge
  // ],200)->header('Content-Type', 'application/json');
  }

}
