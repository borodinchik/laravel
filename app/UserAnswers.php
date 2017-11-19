<?php

namespace App;

use App\Answer;
use App\User;
use App\Question;

class UserAnswers extends Model
{
  public function getAnswerId()
  {
    return $this->hasMany(Answer::class, 'user_answer_id', 'id');
  }
  public function getUserId()
  {
    return $this->hasMany(User::class, 'user_id', 'id');
  }
  public function getQuestionId()
  {
    return $this->hasMany(Question::class, 'question_id', 'id');
  }


}
