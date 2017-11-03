<?php

namespace App;

use App\Answer;

class UserAnswers extends Model
{
  public function answers()
  {
    return $this->belongsTo('App\Answer', 'user_id','answer_id');
  }
}
