<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TasksController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /tasks
    */
    public function getTasks() {

        $user = \Auth::user();
        $tasks = \App\User::where('id','=',$user->id)->with('tasks')->get();


        return view('tasks.index')->with('tasks', $tasks[0]->tasks);
    }

    public function getCompletedTasks() {

        $user = \Auth::user();
        $tasks = \App\User::where('id','=',$user->id)->with('tasks')->get();


        return view('completedTasks.index')->with('tasks', $tasks[0]->tasks);
    }

    public function getUncompletedTasks() {

        $user = \Auth::user();
        $tasks = \App\User::where('id','=',$user->id)->with('tasks')->get();


        return view('uncompletedTasks.index')->with('tasks', $tasks[0]->tasks);
    }

    /**
     * Responds to requests to GET /tasks/add
     */
    public function getAddTask() {

        return view('addTask.index');
    }

    /**
     * Responds to requests to POST /tasks/add
     */
    public function postAddTask(Request $request) {

        $this->validate(
            $request,
            [
              'description' => 'required|min:4',
              'due' => 'required|integer|min:1'
            ]
        );

        $newtask = new \App\Task();

        $user = \Auth::user();

        $newtask->description = $request->description;
        $newtask->due = Carbon::now()->addDays($request->due);

        $newtask->save();

        $user->tasks()->save($newtask);

        \Session::flash('flash_message', 'Successfully added new task!');

        return redirect ('/tasks');
    }

    /**
     * Responds to requests to GET /tasks/edit/{$id}
     */
    public function getEditTask($id = null) {

        $task = \App\Task::find($id);

        if(is_null($task)) {

          \Session::flash('flash_message', 'Task not found');
          return redirect('/tasks');
        }

        return view('editTask.index')->with('task', $task);
    }

    /**
     * Responds to requests to POST /tasks/edit
     */
    public function postEditTask(Request $request) {

          $this->validate(
            $request,
            [
              'description' => 'required|min:4',
              'due' => 'required|integer'
            ]
          );

        $task = \App\Task::find($request->id);


        $task->description = $request->description;
        $task->due = Carbon::now()->addDay($request->due);

        $task->save();

        \Session::flash('flash_message', 'Successfully updated task!');

        return redirect('/tasks');
    }

    /**
     * Responds to requests to GET /tasks/edit
     */
    public function getDeleteTask($id = null) {

      $task = \App\Task::find($id);

      if(is_null($task)) {

        \Session::flash('flash_message', 'Task not found');
        return redirect('/tasks');
      }

      return view('deleteTask.index')->with('task', $task);

    }

    /**
     * Responds to requests to GET /tasks/edit
     */
    public function postDeleteTask(Request $request) {

        $task = \App\Task::find($request->id);

          if($task->users()) {
          $task->users()->detach();
          }

        $task->delete();

        \Session::flash('flash_message', 'Successfully deleted task!');

        return redirect('/tasks');
    }

    /**
     * Responds to requests to GET /tasks/complete
     */
    public function getCompleteTask($id = null) {

      $task = \App\Task::find($id);

      if(is_null($task)) {

        \Session::flash('flash_message', 'Task not found');
        return redirect('/tasks');
      }

      return view('completeTask.index')->with('task', $task);

    }

    /**
     * Responds to requests to GET /tasks/edit
     */
    public function postCompleteTask(Request $request) {

        $task = \App\Task::find($request->id);

        $task->completed = true;

        $task->save();

        \Session::flash('flash_message', 'Successfully completed task!');

        return redirect('/tasks');
    }


}
