<?php

use App\Models\Room;

$rooms = Room::all()->getAll();
view('dashboard/rooms', [
    'title' => 'Rooms',
    'rooms' => $rooms
]);
