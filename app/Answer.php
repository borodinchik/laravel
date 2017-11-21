<?php

namespace App;

use App\UserAnswers;
use App\User;


class Answer extends Model
{
  public function user()
  {
    return $this->hasMany(User::class, 'answer_id', 'question_id' );
  }
}
