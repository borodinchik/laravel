<?php

namespace App;

use App\Answer;
use App\User;
use App\Question;

class UserAnswers extends Model
{
  protected $table = 'user_answers';
  protected $fillable = ['question_id','user_id','user_answer_id'];
}
