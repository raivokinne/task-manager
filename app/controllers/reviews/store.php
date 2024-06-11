<?php

use App\Models\Review;
use Core\Validator;

$rating = $_POST['rating'];
$comment = $_POST['comment'];

$errors = [];

if (!Validator::required($rating) && !Validator::number($rating)) {
    $errors['rating'] = 'Rating is required';
}

if (!Validator::required($comment) && !Validator::checkLength($comment, 10)) {
    $errors['comment'] = 'Comment is required';
}

if (count($errors) > 0) {
    return view('rooms/partials/reviews', [
        'title' => 'Create Review',
        'errors' => $errors,
    ]);
} else {
    Review::create([
        'rating' => $rating,
        'comment' => $comment,
        'user_id' => $_SESSION['user']['id'],
        'room_id' => $_POST['room_id']
    ]);

    redirect('/rooms');
}
