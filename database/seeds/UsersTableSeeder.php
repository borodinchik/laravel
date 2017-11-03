<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //до 18 лет
      User::create([
        'name' => 'Игнатьев Александр Витальевич',
        'email' => 'sasha.zp@gmail.com',
        'password' => bcrypt('vladymyr'),
        'phone_number' => '0969857563',
        'your_age' => '2001-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Алексеев Петр Захарович',
        'email' => 'peyro.zp@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857489',
        'your_age' => '2002-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Богданов Алексей Антонович',
        'email' => 'alex.zp@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857552',
        'your_age' => '2003-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Осипко Виктор Андреевич',
        'email' => 'vit@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857745',
        'your_age' => '2001-01-13',
        'gender' => 'Man',
      ]);
      //свыше 18 лет
      User::create([
        'name' => 'Борода Денис Георгеевич',
        'email' => 'den@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857589',
        'your_age' => '1990-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Кривой Захар Петровичь',
        'email' => 'zahar@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857147',
        'your_age' => '1989-01-13',
        'gender' => 'Man'
      ]);
      User::create([
        'name' => 'Алексеев Петр Захарович',
        'email' => 'peyro@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857489',
        'your_age' => '1988-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Богданов Алексей Антонович',
        'email' => 'alex@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857552',
        'your_age' => '1989-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Осипко Виктор Андреевич',
        'email' => 'vit.zp@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857745',
        'your_age' => '1971-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Борода Денис Георгеевич',
        'email' => 'den.zp@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857589',
        'your_age' => '1994-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Кривой Захар Петровичь',
        'email' => 'zahar.zp@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857147',
        'your_age' => '1994-01-13',
        'gender' => 'Man'
      ]);
      //женщины
      User::create([
        'name' => 'Омельченко Виктория Александровна',
        'email' => 'vika@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857589',
        'your_age' => '2001-01-13',
        'gender' => 'Women',
      ]);
      User::create([
        'name' => 'Петрушена Анна Сергеевна',
        'email' => 'anna@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0968857147',
        'your_age' => '2003-01-13',
        'gender' => 'Women'
      ]);
      //старше 18
      User::create([
        'name' => 'Юхно Юлия Викторовна',
        'email' => 'ulia@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0979857489',
        'your_age' => '1988-01-13',
        'gender' => 'Women',
      ]);
      User::create([
        'name' => 'Снежка Дарья Антонова',
        'email' => 'daha@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857662',
        'your_age' => '1989-01-13',
        'gender' => 'Women',
      ]);
      User::create([
        'name' => 'Романова Надежда Владимировна',
        'email' => 'nadia@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969853245',
        'your_age' => '1971-01-13',
        'gender' => 'Women',
      ]);
      User::create([
        'name' => 'Лумаченко Евгения Максимовна',
        'email' => 'maksimovna@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857129',
        'your_age' => '1994-09-13',
        'gender' => 'Women',
      ]);
      User::create([
        'name' => 'Зеленская Екатерина Владимировна',
        'email' => 'zahar.zpr@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969844147',
        'your_age' => '1994-02-22',
        'gender' => 'Women'
      ]);

      }
    }
