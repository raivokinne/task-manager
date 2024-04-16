<?php
use App\Models\Task;
$tasks = Task::all();
return view('tasks/index', [
    'title' => 'Tasks',
    'tasks' => $tasks
]);