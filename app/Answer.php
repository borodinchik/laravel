<?php

namespace App;

use App\UserAnswers;
use App\User;
use App\Question;


class Answer extends Model
{
  protected $table = 'answers';
  protected $fillable = ['answer','question_id'];

  public function user()
  {
    return $this->belongsToMany(User::class);
  }
  public function question()
  {
    return $this->belongsTo(Question::class);
  }

}
