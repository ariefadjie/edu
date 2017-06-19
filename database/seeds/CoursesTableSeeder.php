<?php

use Illuminate\Database\Seeder;
use App\Course;
use Carbon\Carbon;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Course::truncate();
        Course::insert([
    		[
    			'name' => 'Pengembangan Bisnis',
    			'created_at' => Carbon::now(),
    		],
    		[
    			'name' => 'Jaringan Komputer',
    			'created_at' => Carbon::now(),
    		],
    		[
    			'name' => 'Riset Operasi',
    			'created_at' => Carbon::now(),
    		],
    		[
    			'name' => 'Analisis Perangkat Lunak',
    			'created_at' => Carbon::now(),
    		],
    		[
    			'name' => 'Pemrograman Web Dinamis',
    			'created_at' => Carbon::now(),
    		],
    		[
    			'name' => 'Basis Data Terdistribusi',
    			'created_at' => Carbon::now(),
    		],
    		[
    			'name' => 'Pemodelan dan Simulasi',
    			'created_at' => Carbon::now(),
    		],
        ]);
    }
}
