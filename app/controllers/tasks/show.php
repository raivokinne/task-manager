<?php

use App\Models\Task;
use App\Models\Category;

$task = Task::find($id)->get();
$category = Category::find($task['category_id'])->get();
$task['category'] = $category['name'];



return view('tasks/show', [
    'title' => 'Show Task',
    'task' => $task,
]);
