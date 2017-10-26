<?php

use Illuminate\Database\Seeder;
use App\Answer;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::create([
          'answer' => 'Тойота',
          'question_id' => '1',

        ]);
        Answer::create([
          'answer' => 'Мицубищи',
          'question_id' => '1',
        ]);
        Answer::create([
          'answer' => 'Вольво',
          'question_id' => '1',
        ]);
        Answer::create([
          'answer' => 'Опель',
          'question_id' => '1',
        ]);
        ////////////////////
        Answer::create([
          'answer' => 'Мало активный',
          'question_id' => '2',
        ]);
        Answer::create([
          'answer' => 'Активный',
          'question_id' => '2',
        ]);
        Answer::create([
          'answer' => 'Очень активный',
          'question_id' => '2',
        ]);
    }
}
