<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\UserAnswers;

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
  
  $data = UserAnswers::leftJoin('users', function($join) use($id) {
  $join->on('users.id', '=', 'results.user_id');

  })->leftJoin('answers', function($join) use($id) {
  $join->on('results.answer_id', '=', 'answers.id');

  })->selectRaw('results.question_id as question_id, results.answer_id as answer_id, users.id as user_id, 
  answers.answer, users.sex, count(users.sex) as count_sex, count(users.date_of_birth) as count_bd')
  ->groupBy(['answers.answer','users.sex'
  ])->where('users.date_of_birth', '<=', '1999-01-01')->where('results.question_id', $id)
  ->get()
  ->toArray();
  dd($data);


}
}
