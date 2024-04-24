<?php

use App\Models\Task;

use App\Models\User;
use Core\Validator;

$title = $_POST['title'] ?? null;
$description = $_POST['description'] ?? null;
$deadline = $_POST['deadline'] ?? null;
$priority = $_POST['priority'] ?? null;
$token = $_POST['_token'];

if (!csrf_verify($token)) {
    redirect('/tasks');
}

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

if (empty($errors)) {
    $user = User::where('email', $_SESSION["user"]['email'])->get();
    Task::create([
        'user_id' => $user["id"],
        'title' => $title,
        'description' => $description,
        'deadline' => $deadline,
        'priority' => $priority,
        'category_id' => 1
    ]);

    redirect('/');
} else {
    return view('tasks/' . $id . '/edit', ['errors' => $errors]);
}
