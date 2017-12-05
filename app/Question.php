<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Answer;

class Question extends Model
{
  protected $table = 'questions';
  protected $fillable = ['title','body'];

  public function answer()
  {
      return $this->hasMany(Answer::class);
  }
 public function userQuestions()
 {
   return $this->bilongsTo('App\User');
 }
}
