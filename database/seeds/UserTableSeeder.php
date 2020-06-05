<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user=App\User::create([
        'name'=>'Mahfujur Rahman',
        'email'=>'overcastmoon@gmail.com',
        'password'=>bcrypt('Mahfujur$51'),
        'admin'=>1

       ]);

       App\Profile::create([

        'user_id'=>$user->id,
        'avatar'=>'uploads/avatar/1.jpg',
        'about'=>'Demo Text Demo Text  Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text',
        'facebook'=>'https://github.com/Mahfujur51',
        'youtube'=>'https://github.com/Mahfujur51'


       ]);

    }
}
