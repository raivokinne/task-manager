<?php
use App\Models\Task;
$task = Task::find($id);

return view('tasks/show', [
    'title' => 'Show Task',
    'task' => $task
]);

