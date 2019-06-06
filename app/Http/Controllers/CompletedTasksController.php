<?php

namespace App\Http\Controllers;

use App\Task;

class CompletedTasksController extends Controller
{
    public function complete(Task $task)
    {
    	$task->complete();
    	return back();
    }

    public function incomplete(Task $task)
    {
    	$task->incomplete();
    	return back();
    }
}
