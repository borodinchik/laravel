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
      User::create([
        'name' => 'Игнатьев Александр Витальевич',
        'email' => 'sasha@gmail.com',
        'password' => bcrypt('vladymyr'),
        'phone_number' => '0969857563',
        'your_age' => '1994-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Алексеев Петр Захарович',
        'email' => 'peyro@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857489',
        'your_age' => '1994-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Богданов Алексей Антонович',
        'email' => 'alex@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857552',
        'your_age' => '1994-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Осипко Виктор Андреевич',
        'email' => 'vit@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857745',
        'your_age' => '1994-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Борода Денис Георгеевич',
        'email' => 'den@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857589',
        'your_age' => '1994-01-13',
        'gender' => 'Man',
      ]);
      User::create([
        'name' => 'Кривой Захар Петровичь',
        'email' => 'zahar@gmail.com',
        'password' => bcrypt('123456'),
        'phone_number' => '0969857147',
        'your_age' => '1994-01-13',
        'gender' => 'Man'
      ]);

      }
    }
