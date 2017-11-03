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
          'answer' => 'Велосипед',
          'question_id' => '1',

        ]);
        Answer::create([
          'answer' => 'Автомобиль',
          'question_id' => '1',
        ]);
        Answer::create([
          'answer' => 'Трамвай',
          'question_id' => '1',
        ]);
        Answer::create([
          'answer' => 'Ролики',
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
        //////////////////////////////////
        Answer::create([
          'answer' => 'Курю',
          'question_id' => '3',
        ]);
        Answer::create([
          'answer' => 'Пью',
          'question_id' => '3',
        ]);
        Answer::create([
          'answer' => 'Не курю и не пью',
          'question_id' => '3',
        ]);
        ////////////////////
        Answer::create([
          'answer' => 'Зима',
          'question_id' => '4',
        ]);
        Answer::create([
          'answer' => 'Весна',
          'question_id' => '4',
        ]);
        Answer::create([
          'answer' => 'Лето',
          'question_id' => '4',
        ]);
        Answer::create([
          'answer' => 'Осень',
          'question_id' => '4',
        ]);
    }
}
