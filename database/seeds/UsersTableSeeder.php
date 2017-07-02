<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::truncate();
        User::insert([
                [
                    'name' => 'Jevan Nelson',
                    'email' => 'jevannelson@gmail.com',
                    'password' => bcrypt(123123),
                    'created_at' => Carbon::now(),
                ],
        		[
        			'name' => 'Arief Gmail',
        			'email' => 'id.ariefadjie@gmail.com',
        			'password' => bcrypt(123123),
        			'created_at' => Carbon::now(),
        		],
        		[
        			'name' => 'Arief Hello',
        			'email' => 'hello@ariefadjie.com',
        			'password' => bcrypt(123123),
        			'created_at' => Carbon::now(),
        		],
        		[
        			'name' => 'Arief iCloud',
        			'email' => 'ariefadjie@icloud.com',
        			'password' => bcrypt(123123),
        			'created_at' => Carbon::now(),
        		],
        ]);
        DB::table('course_user')->truncate();
    }
}
