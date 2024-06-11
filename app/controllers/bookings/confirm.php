<?php

use App\Models\Booking;

Booking::update($id,[
    'status' => 'confirmed'
]);

redirect('/dashboard/bookings');
