<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAnswers;

class AnswerController extends Controller
{
public function getAnswer()
{
$getAnswer = UserAnswers::groupBy('answer_id')->selectRaw('answer_id, count(*) as count')->get()->toJson();

return $getAnswer;

// dd($getAnswer);
}
}
