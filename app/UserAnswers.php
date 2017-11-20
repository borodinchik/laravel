<?php

namespace App;

use App\Answer;
use App\User;
use App\Question;

class UserAnswers extends Model
{
  public function getAnswerId()
  {
    return $this->belongsTo(Answer::class);//UserAnswers связываю с Answer
  }
  // public function getUserId()
  // {
  //   return $this->hasMany(User::class);
  // }
  // public function getQuestionId()
  // {
  //   return $this->hasMany(Question::class);
  // }


}
