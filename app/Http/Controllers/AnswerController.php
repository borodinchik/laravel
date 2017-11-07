<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AnswerController extends Controller
{
  //этим меттодом передаем данные для построения графика !!
public function getAnswer()
{
    $getAnswer = UserAnswers::groupBy('answer_id')
        ->selectRaw('answer_id, count(*) as count')->get()->toJson();
            return $getAnswer;
          }
public function getInfoToGrap()
{
  $getInfoToGrap = Answer::groupBy('answer')
      ->selectRaw('answer, count(*) as count')->get()->toJson();
      return $getInfoToGrap;


}
}
