<?php

namespace App\controllers\tasks;

use Core\Validator;
use App\Models\Task;
use App\Models\User;

$errors = [];

$title = $_POST['title'] ?? null;
$description = $_POST['description'] ?? null;
$deadline = $_POST['deadline'] ?? null;
$priority = $_POST['priority'] ?? null;
$category = $_POST['category'] ?? null;

if (!Validator::string($title)) {
    $errors["title"] = "Is that a title?";
}
if (!Validator::string($description)) {
    $errors["description"] = "Is that a description?";
}
if (!Validator::date($deadline)) {
    $errors["deadline"] = "You need a deadline";
}
if (!Validator::string($priority)) {
    $errors["priority"] = "You need a priority";
}

if (!Validator::number($category)) {
    $errors["category"] = "You need a category";
}

if (empty($errors)) {
    $user = User::where('email', "=", $_SESSION["user"]['email'])->get();
    Task::create([
        'user_id' => $user['id'],
        'title' => $title,
        'description' => $description,
        'deadline' => $deadline,
        'priority' => $priority,
        'category_id' => $category
    ]);

    redirect('/tasks');
} else {
    return view('tasks/create', ['errors' => $errors]);
}
