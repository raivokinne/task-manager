<?php

use App\Models\Booking;

$booking = Booking::find($id);

view('bookings/show', [
    'booking' => $booking
]);
