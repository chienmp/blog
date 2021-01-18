<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'pmchien',
            'email' => 'chien@gmail.com',
            'password' => bcrypt('admin123'),
            'created_at' => Carbon::now(),
        ]);
        
        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'UserChien',
            'email' => 'chien@email.com',
            'password' => bcrypt('chien123'),
            'created_at' => Carbon::now(),
        ]);
    }
}
