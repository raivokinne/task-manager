<?php

use App\Models\Room;
use App\Models\Review;
use App\Models\User;

$room = Room::find($id)->get();
$reviews = Review::where('room_id', "=", $id)->getAll();
$users = User::all()->getAll();

view('rooms/show', [
    'title' => 'Room Details',
    'room' => $room,
    'reviews' => $reviews,
    'users' => $users
]);
