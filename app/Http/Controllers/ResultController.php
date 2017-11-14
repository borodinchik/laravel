<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
  public function getInfoToGrap()
  {
    // select count(user_id) as count_user_id from (
    //   select questions.id as question_id,answers.id as answer_id,user_answers.user_id
    //   from questions
    //   inner join answers on answers.question_id = questions.id
    //   inner join user_answers on user_answers.user_answer_id = answers.id
    //   where question_id = 1
    //   ) as temp
    //   group by temp.answer_id;






    // $data = UserAnswers::leftJoin('users', function($join) use($id) {
    // $join->on('users.id', '=', 'results.user_id');

    // })->leftJoin('answers', function($join) use($id) {
    // $join->on('results.answer_id', '=', 'answers.id');

    // })->selectRaw('results.question_id as question_id, results.answer_id as answer_id, users.id as user_id,
    // answers.answer, users.sex, count(users.sex) as count_sex, count(users.date_of_birth) as count_bd')
    // ->groupBy(['answers.answer','users.sex'
    // ])->where('users.date_of_birth', '<=', '1999-01-01')->where('results.question_id', $id)
    // ->get()
    // ->toArray();
    dd($data);


  }
}
