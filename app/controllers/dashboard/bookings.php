<?php

use App\Models\Booking;
use App\Models\Room;

$booking = Booking::all()->getAll();
$rooms = Room::all()->getAll();

view('dashboard/bookings', [
    'booking' => $booking,
    'rooms' => $rooms
]);
