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
        'answer_id' => '1',
        'user_id' => '1',

      ]);
      UserAnswers::create([
        'answer_id' => '1',
        'user_id' => '2',

      ]);
      UserAnswers::create([
        'answer_id' => '2',
        'user_id' => '3',

      ]);

      UserAnswers::create([
        'answer_id' => '2',
        'user_id' => '4',

      ]);
      UserAnswers::create([
        'answer_id' => '3',
        'user_id' => '5',
      ]);

      UserAnswers::create([
        'answer_id' => '1',
        'user_id' => '6',

      ]);
      UserAnswers::create([
        'answer_id' => '3',
        'user_id' => '7',

      ]);
      UserAnswers::create([
        'answer_id' => '1',
        'user_id' => '8',

      ]);

      UserAnswers::create([
        'answer_id' => '2',
        'user_id' => '9',

      ]);
      UserAnswers::create([
        'answer_id' => '1',
        'user_id' => '10',
      ]);


    }
}
