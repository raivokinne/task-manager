<?php

use Core\Validator;
use App\Models\Task;

$query = $_GET['q'] ?? '';

if (!Validator::string($query)) {
    $errors['query'] = 'Query must be a string';
}

if (empty($errors)) {
    $tasks = Task::where('title', 'like', "%$query%")->getAll();

    echo json_encode($tasks);
} else {
    return view('tasks/index', ['errors' => $errors]);
}
