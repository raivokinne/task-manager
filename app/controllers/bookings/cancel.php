<?php

use App\Models\Booking;

Booking::update($id,[
    'status' => 'cancelled',
]);

redirect('/dashboard/bookings');
