<?php

use App\Models\Booking;
use App\Models\Review;
use App\Models\User;
use App\Models\Room;

$totalUsers = User::all()->count();
$totalRooms = Room::all()->count();
$totalOrders = Booking::all()->count();
$totalReviews = Review::all()->count();

view('dashboard/index', [
    'title' => 'Dashboard',
    'totalUsers' => $totalUsers,
    'totalRooms' => $totalRooms,
    'totalOrders' => $totalOrders,
    'totalReviews' => $totalReviews
]);
