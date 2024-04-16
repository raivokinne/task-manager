<?php 
use Core\Validator;
use App\Models\Task;
use App\Models\User;
$errors = [];

$title = $_POST['title'];
$description = $_POST['description'];
$deadline = $_POST['deadline'];
$priority = $_POST['priority'];


if (!Validator::string($_POST["title"], 1, 50)) {
    $errors["title"] = "Title cannot be empty or too long";
  }
  if (!Validator::number($_POST["description"], 1, 500)) {
    $errors["description"] = "Description too long";
  }
  if (!Validator::required($_POST["deadline"])) {
    $errors["deadline"] = "You need a deadline nigga";
  }
  if (!Validator::required($_POST["priority"])) {
    $errors["priority"] = "You need a prioirty";
  }

if (empty($errors)) {
redirect('/tasks/create');
}
$user = User::where('email', $_SESSION["user"]['email'])->get();
// dd($user);
 Task::create([
        'user_id' => $user["id"],
        'title' => $title,
        'description' => $description,
        'deadline' => $deadline,
        'priority' => $priority,
        'category_id' => 1
    ]);

    redirect('/');








