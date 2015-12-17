<?php

use Illuminate\Database\Seeder;

class TaskUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      # First, create an array of all the users we want to associate tasks with
      # The *key* will be the user e-mail, and the *value* will be an array of tasks.
      $users =[
          'jill@harvard.edu' => ['Do homework','Update project','Wash laundry'],
          'jamal@harvard.edu' => ['Clean bathroom','Call parents','Fill out timecard']
      ];

      # Now loop through the above array, creating a new pivot for each user linked to a task
      foreach($users as $email => $tasks) {

          # First get the user
          $user = \App\User::where('email','like',$email)->first();

          # Now loop through each task for this user, adding the pivot
          foreach($tasks as $description) {
              $task = \App\Task::where('description','LIKE',$description)->first();

              # Connect this task to this user
              $user->tasks()->save($task);
          }

      }
    }
}
