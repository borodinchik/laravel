<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\UserAnswers;
use DB;

class AnswerController extends Controller
{
  public function userAnswer()
  {
     return $this->bilongsTo(UserAnswers::class,'question_id', 'id');
  }

}
