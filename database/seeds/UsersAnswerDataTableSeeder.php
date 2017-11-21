<?php

use Illuminate\Database\Seeder;
use App\UserAnswers;
class UsersAnswerDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      UserAnswers::create([
        'user_answer_id' => '1',
        'user_id' => '1',
        'question_id' => '1',
      ]);
      UserAnswers::create([
        'user_answer_id' => '1',
        'user_id' => '2',
        'question_id' => '1',
      ]);
      UserAnswers::create([
        'user_answer_id' => '2',
        'user_id' => '3',
        'question_id' => '1',
      ]);

      UserAnswers::create([
        'user_answer_id' => '2',
        'user_id' => '4',
        'question_id' => '1',
      ]);
      UserAnswers::create([
        'user_answer_id' => '3',
        'user_id' => '5',
        'question_id' => '1',

      ]);
      UserAnswers::create([
        'user_answer_id' => '3',
        'user_id' => '6',
        'question_id' => '1',//1

      ]);
      //2
      UserAnswers::create([
        'user_answer_id' => '3',
        'user_id' => '7',
        'question_id' => '1',

      ]);
      UserAnswers::create([
        'user_answer_id' => '3',
        'user_id' => '8',
        'question_id' => '1',//1

      ]);
      UserAnswers::create([
        'user_answer_id' => '2',
        'user_id' => '9',
        'question_id' => '1',//1

      ]);
    }
}
