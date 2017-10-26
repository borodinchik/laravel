<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
          'name' => 'Vladymyr',
          'email' => 'vladymyr@gmail.com',
          'password' => bcrypt('vladymyr'),
        ]);
    }
}
