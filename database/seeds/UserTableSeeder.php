<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->delete();

        User::create([
        	'name' => 'Omika Ambalkar',
        	'email' => 'omika98@gmail.com',
        	'password' => Hash::make('omika1234'),
        	'remember_token' => str_random(10)
        ]);
    }
}
