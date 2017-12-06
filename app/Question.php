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

  static function dataCharts($id)
  {
    $getAnswersQuestions = Question::with(['answer'])
    ->where('id', '='  ,$id)->first();

    $countUser = UserAnswers::selectRaw('count(user_id) as count_all_user, answer_id')
    ->groupBy('answer_id')->get();

    $genderMan = User::selectRaw('count(gender) as count_gender_man')
    ->where('gender', 'Man')->get();

    $genderWomen = User::selectRaw('count(gender) as count_gender_women')
    ->where('gender', 'Women')->get();

    $adultAge = User::where('your_age', '<=', '1999-01-01')
    ->selectRaw('count(your_age) as count_adult_age_user')->get();

    $imperfectAge = User::where('your_age', '>', '1999-01-01')
    ->selectRaw('count(your_age) as count_imperfect_age_user')->get();
// dd($imperfectAge->toArray());
        // dd($genderWomen,
        // $genderMan,
        // $adultAge,$countUser,
        // $imperfectAge,
        // $getAnswersQuestions);
        return response()->json([
          $getAnswersQuestions,
          $countUser,
          $adultAge,
          $genderMan,
          $genderWomen,
  ],200)->header('Content-Type', 'application/json');
  }

}
