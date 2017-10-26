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
        'title' => 'Автомобиль',
        'body' => 'Какой марки был вашь первый автомобиль?',
      ]);
      Question::create([
        'title' => 'ЗОЖ',
        'body' => 'Какой образ жизни вы видете?',
      ]);

    }
}
