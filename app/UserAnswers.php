<?php

namespace App;

use App\Answer;
use App\User;

class UserAnswers extends Model
{
  public function answers()
  {
    return $this->belongsTo(Answer::class);
  }
  public function getUserId()
  {
    return $this->belongsTo(User::class);
  }


}
