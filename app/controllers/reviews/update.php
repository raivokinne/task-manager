<?php

use App\Models\Room;

$rating = $_POST['rating'];
$comment = $_POST['commnet'];

$errors = [];

if (empty($rating)) {
    $errors['rating'] = 'Rating is required';
} else if (!is_numeric($rating)) {
    $errors['rating'] = 'Rating must be a number';
}

if (empty($comment)) {
    $errors['comment'] = 'Comment is required';
} else if (strlen($comment) < 3) {
    $errors['comment'] = 'Comment must be at least 3 characters';
} else if (strlen($comment) > 255) {
    $errors['comment'] = 'Comment must be at most 255 characters';
}

if (empty($errors)) {
    Room::update($id, [
        'user_id' => $_SESSION['user']['id'],
        'room_id' => $roomId,
        'rating' => $rating,
        'comment' => $comment
    ]);

    redirect('/rooms');
} else {
    view('rooms/partials/reviews', [
        'title' => 'Update Review',
        'errors' => $errors
    ]);
}
