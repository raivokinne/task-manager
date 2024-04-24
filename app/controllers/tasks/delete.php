<?php

use App\Models\Task;

$token = $_POST['_token'];

if (!csrf_verify($token)) {
    redirect('/tasks');
}

Task::delete($id);

redirect('/tasks');
