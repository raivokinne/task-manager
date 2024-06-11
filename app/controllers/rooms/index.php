<?php

use App\Models\Room;
use App\Models\Category;

$rooms = Room::all()->getAll();
$categories = Category::all()->getAll();

$filteredRooms = $rooms;

if (isset($_GET['category']) && $_GET['category'] !== '') {
    $filteredRooms = array_filter($filteredRooms, function($room) {
        return $room['category_id'] == $_GET['category'];
    });
}

if (isset($_GET['price']) && $_GET['price'] !== '') {
    $filteredRooms = array_filter($filteredRooms, function($room) {
        return $room['price'] <= $_GET['price'];
    });
}

if (isset($_GET['search']) && $_GET['search'] !== '') {
    $filteredRooms = array_filter($filteredRooms, function($room) {
        return strpos(strtolower($room['name']), strtolower($_GET['search'])) !== false;
    });
}

view('rooms/index', [
    'title' => 'Rooms',
    'rooms' => $filteredRooms,
    'categories' => $categories
]);
