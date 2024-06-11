<?php

use App\Models\Booking;

$room_id = $_POST['room_id'];
$user_id = $_SESSION['user']['id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$total_price = $_POST['total_price'];

$errors = [];

if (empty($room_id)) {
    $errors['room_id'] = 'Please select a room';
}

if (empty($user_id)) {
    $errors['user_id'] = 'Please select a user';
}

if (empty($start_date)) {
    $errors['start_date'] = 'Please select a start date';
} else {
    $start_date = date('Y-m-d', strtotime($start_date));
}

if (empty($end_date)) {
    $errors['end_date'] = 'Please select an end date';
} else {
    $end_date = date('Y-m-d', strtotime($end_date));
}

if (empty($total_price)) {
    $errors['total_price'] = 'Please enter a total price';
} else if ($total_price < 0) {
    $errors['total_price'] = 'Please enter a valid total price';
}

if (empty($errors)) {
    Booking::create([
        'room_id' => $room_id,
        'user_id' => $user_id,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'total_price' => $total_price,
        'status' => 'pending',
    ]);

    redirect('/rooms');
} else {
    redirect('/rooms/' . $room_id . '/show');
}
