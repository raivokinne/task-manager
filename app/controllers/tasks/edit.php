<?php

use App\Models\Task;

$task = Task::find($id)->get();



return view('tasks/edit', [
    'title' => 'Edit Task',
    'task' => $task
]);