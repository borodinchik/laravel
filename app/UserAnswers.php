<?php

namespace App;

use App\Answer;
use App\User;
use App\Question;

class UserAnswers extends Model
{
  protected $table = 'user_answers';
  protected $fillable = ['user_id','answer_id'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

}
