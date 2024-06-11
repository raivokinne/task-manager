<?php

use App\Models\Category;

$categories = Category::all()->getAll();

view('rooms/create', [
    'title' => 'Create Room',
    'categories' => $categories
]);
