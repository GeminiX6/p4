<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'description' => 'Do homework',
        'due' => Carbon\Carbon::now()->addWeek(),
        ]);

        DB::table('tasks')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'description' => 'Wash laundry',
        'due' => Carbon\Carbon::now()->addDay(),
        ]);

        DB::table('tasks')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'description' => 'Clean bathroom',
        'due' => Carbon\Carbon::now()->addDay(),
        ]);
    }
}
