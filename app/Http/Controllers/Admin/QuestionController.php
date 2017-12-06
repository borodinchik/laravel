<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionsRequest;
use App\Question;
use App\Answer;
use App\User;

class QuestionController extends Controller
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
    $data = Question::dataCharts($id);
    return $data;
  }

}
