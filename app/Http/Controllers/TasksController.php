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

        $task = \App\Task::orderBy('due','ASC')->get();

        return view('tasks.index')->with('tasks', $task);
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

        $newtask->description = $request->description;
        $newtask->due = Carbon::now()->addDay($request->due);

        $newtask->save();

        \Session::flash('flash_message', 'Successfully added new task!');

        return redirect ('/tasks');
    }

    /**
     * Responds to requests to GET /tasks/edit/{$id}
     */
    public function getEditTask($id = null) {

        $task = \App\Task::find($id);

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
              'due' => 'required|integer|min:1'
            ]
          );

        $task = \App\Task::find($request->$id);

        $task->description = $request->description;
        $task->due = Carbon::now()->addDay($request->due);

        $task->save();

        \Session::flash('flash_message', 'Successfully updated task!');

        return redirect ('/tasks');
    }

    /**
     * Responds to requests to GET /tasks/edit
     */
    public function getDeleteTask() {
        return view('deleteTask.index');
    }

    /**
     * Responds to requests to GET /tasks/edit
     */
    public function postDeleteTask() {
        return view('deleteTask.postindex');
    }


}
