<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\UserAnswers;
use App\User;


class Answer extends Model
{

  public function user()
  {
    return $this->hasMany('App\UserAnswers', 'answer_id', 'question_id' );
  }
}
