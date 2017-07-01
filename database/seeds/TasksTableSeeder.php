<?php

use Illuminate\Database\Seeder;
use App\Task;
use Carbon\Carbon;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Task::truncate();
        Task::insert([
    		[
    			'name' => 'Packet Tracert',
                'course_id' => 2,
                'type' => 'quiz',
    			'created_at' => Carbon::now(),
    		],
            [
                'name' => 'VLAN',
                'course_id' => 2,
                'type' => 'task',
                'created_at' => Carbon::now(),
            ],
    		[
    			'name' => 'PHP Framework',
                'course_id' => 5,
                'type' => 'task',
    			'created_at' => Carbon::now(),
    		],
        ]);
    }
}
