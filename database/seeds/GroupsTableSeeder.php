<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
        	'group_name' => 'Użytkownik',
        	'group_color' => 'blue',
        	]);

        Group::create([
            'group_name' => 'Blogger',
            'group_color' => 'green',
            ]);
    }
}
