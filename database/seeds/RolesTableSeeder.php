<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Role::truncate();
        Role::insert([
    		[
    			'name' => 'admin',
                'display_name' => 'Lecturer',
    			'created_at' => Carbon::now(),
    		],
            [
                'name' => 'user',
                'display_name' => 'Student',
                'created_at' => Carbon::now(),
            ],
        ]);
        $tableNames = config('laravel-permission.table_names');
        DB::table($tableNames['user_has_roles'])->truncate();
        User::find(1)->assignRole('admin');
        foreach (User::skip(1)->take(3)->get() as $key => $user) {
            $user->assignRole('user');
        }
    }
}
