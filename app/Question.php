<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Answer;

class Question extends Model
{
  public function answer()
  {
      return $this->hasMany(Answer::class);
  }
  public function userAnswer()
  {
     return $this->bilongsTo(UserAnswers::class);
  }
}
