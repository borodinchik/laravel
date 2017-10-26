<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionsRequest;
use App\Question;
use App\Answer;

class QuestionController extends Controller
{
public function __consruct()
  {
    $this->middleware('guest:admin');
  }

public function index(Question $questions){
    //show all list qwestion
    $questions = $questions->all();
    return view('questions.index', compact('questions'));
  }

  public function show($id){
      //show questions by "id"
      $questions = Question::with(['answer'])
      ->where('id', '='  ,$id)->first();

      return view('questions.show', compact('questions'));
}
  public function store(QuestionsRequest $request){
      //Create new qwestions
      $question = new Question();
      $question->title = $request['title'];
      $question->body = $request['body'];
      $question->save();

      foreach ($request->input('answer') as $answer) {
        $newAnswer = new Answer();
        $newAnswer->question_id = $question->id;
        $newAnswer->answer = $answer;
        $newAnswer->save();
}
      return redirect()->back();

    }
}
