<?php

use App\Models\Room;
use App\Models\Category;

$room = Room::find($id)->get();
$categories = Category::all()->getAll();

view('rooms/edit', [
    'title' => 'Room Details',
    'room' => $room,
    'categories' => $categories
]);
