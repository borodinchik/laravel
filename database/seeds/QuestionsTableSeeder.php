<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Question::create([
        'title' => 'Транспорт',
        'body' => 'Какой транспорт вы предпочитаете?',
      ]);
      Question::create([
        'title' => 'ЗОЖ',
        'body' => 'Какой образ жизни вы видете?',
      ]);
      Question::create([
        'title' => 'Вредные привычки',
        'body' => 'Какие у вас вредные привычки',
      ]);
      Question::create([
        'title' => 'Время года',
        'body' => 'Какая время года вам ближе?',
      ]);


    }
}
