<?php

use Illuminate\Database\Seeder;
use App\Question;
use Carbon\Carbon;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Question::truncate();
        Question::insert([
            [
                'content' => 'Jelaskan yang anda ketahui tentang VLAN!',
                'task_id' => 2,
                'max_score' => 20,
                'created_at' => Carbon::now(),
            ],
            [
                'content' => 'Berikan contoh penerapan VLAN dalam suatu jaringan!',
                'task_id' => 2,
                'max_score' => 10,
                'created_at' => Carbon::now(),
            ],
    		[
    			'content' => 'Apa yang anda ketahui tentang PHP Framework?',
                'task_id' => 3,
                'max_score' => 20,
    			'created_at' => Carbon::now(),
    		],
            [
                'content' => 'Sebutkan kelebihan menggunakan PHP Framework!',
                'task_id' => 3,
                'max_score' => 10,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
