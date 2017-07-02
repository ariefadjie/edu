<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(UsersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
