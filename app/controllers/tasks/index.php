<?php

use App\Models\Category;
use App\Models\Task;

$tasks = Task::all()->getAll();
$categories = Category::all()->getAll();
return view('tasks/index', [
    'title' => 'Tasks',
    'tasks' => $tasks,
    'categories' => $categories
]);

