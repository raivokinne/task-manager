<?php

namespace App\controllers\tasks;

use App\Models\Category;

$categories = Category::all()->getAll();

return view('tasks/create', [
    'title' => 'Create Task',
    'categories' => $categories
]);
