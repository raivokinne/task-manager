<?php

use App\Models\Task;

Task::execute("UPDATE tasks SET status =:status WHERE id=:id", [
    "status" => "finish",
    "id" => $id
]);

redirect("/tasks");
