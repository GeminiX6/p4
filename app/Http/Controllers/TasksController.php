<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TasksController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /tasks
    */
    public function getTasks() {
        return 'List all the tasks';
    }

    /**
     * Responds to requests to GET /tasks/add
     */
    public function getAddTask() {
        return 'Form to create a new task';
    }

    /**
     * Responds to requests to POST /tasks/add
     */
    public function postAddTask() {
        return 'Process adding new task';
    }

    /**
     * Responds to requests to GET /tasks/edit
     */
    public function getEditTask() {
        return 'Form to edit a task';
    }

    /**
     * Responds to requests to POST /tasks/edit
     */
    public function postEditTask() {
        return 'Process editting the task';
    }

    /**
     * Responds to requests to GET /tasks/edit
     */
    public function getDeleteTask() {
        return 'Confirmation to delete a task';
    }

    /**
     * Responds to requests to GET /tasks/edit
     */
    public function postDeleteTask() {
        return 'Delete the task';
    }


}
