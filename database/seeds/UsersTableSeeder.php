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
        	'username' => 'Adrian',
        	'email' => 'adriandj83@gmail.com',
        	'password'=> bcrypt('plerp123'),
        	'group_id' => 2
        	]);
    }
}
