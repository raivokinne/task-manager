<?php

use App\Models\Room;
use App\Models\Review;

$review = Review::find($id)->get();
$room = Room::find($review['room_id'])->get();

view('reviews/edit', [
    'title' => 'Edit Review',
    'room_id' => $room['id'],
    'review' => $review
]);
