<?php

use Illuminate\Database\Seeder;
use App\Answer;

class AnswersTableSeeder extends Seeder
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
      ////
      Answer::create([
        'answer' => 'Почти не сижу в интернете',
        'question_id' => '5',
      ]);
      Answer::create([
        'answer' => 'Несколько раз в неделю',
        'question_id' => '5',
      ]);
      Answer::create([
        'answer' => 'Захожу каждый день, меньше часа',
        'question_id' => '5',
      ]);
      Answer::create([
        'answer' => 'Каждый день, больше часа',
        'question_id' => '5',
      ]);
      Answer::create([
        'answer' => 'Каждый день, больше 3 часо',
        'question_id' => '5',
      ]);
      ///
      Answer::create([
        'answer' => 'У меня всё есть! Я счаслив(а)!',
        'question_id' => '6',
      ]);
      Answer::create([
        'answer' => 'Денег',
        'question_id' => '6',
      ]);
      Answer::create([
        'answer' => 'Здоровья',
        'question_id' => '6',
      ]);
      Answer::create([
        'answer' => 'Любви',
        'question_id' => '6',
      ]);
      Answer::create([
        'answer' => 'Свободы',
        'question_id' => '6',
      ]);
      Answer::create([
        'answer' => 'Откосить от армии навсегда',
        'question_id' => '6',
      ]);
      ///////
      Answer::create([
        'answer' => 'Да',
        'question_id' => '7',
      ]);
      Answer::create([
        'answer' => 'Нет',
        'question_id' => '7',
      ]);
      Answer::create([
        'answer' => 'У меня линзы',
        'question_id' => '7',
      ]);
      Answer::create([
        'answer' => 'Только солнцезащитные очки',
        'question_id' => '7',
      ]);
      ////
      Answer::create([
        'answer' => 'Да, ежедневно (через каждое слово)',
        'question_id' => '8',
      ]);
      Answer::create([
        'answer' => 'Да, постоянно (часто)',
        'question_id' => '8',
      ]);
      Answer::create([
        'answer' => 'Да, иногда (редко)',
        'question_id' => '8',
      ]);
      Answer::create([
        'answer' => 'Нет',
        'question_id' => '8',
      ]);
    }
}
