<?php

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Core\Session;

if (!Session::has('user')) {
    $tasks = [];
} else {
    $tasks = Task::where('user_id', '=', $_SESSION["user"]["id"])->getAll();
}

$categories = Category::all()->getAll();
if (isset($_GET['category']) && $_GET['category'] !== '') {
    $filteredTasks = [];
    foreach ($tasks as $task) {
        if ($task['category_id'] == $_GET['category']) {
            $filteredTasks[] = $task;
        }
    }
} else {
    $filteredTasks = $tasks;
}



return view('tasks/index', [
    'title' => 'Tasks',
    'filteredTasks' => $filteredTasks,
    'categories' => $categories
]);
