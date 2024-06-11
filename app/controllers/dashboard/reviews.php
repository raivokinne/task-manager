<?php

use App\Models\Review;
use App\Models\User;
use App\Models\Room;

view('dashboard/reviews', [
    'title' => 'Reviews',
    'reviews' => Review::all()->getAll(),
    'users' => User::all()->getAll(),
    'rooms' => Room::all()->getAll(),
]);
