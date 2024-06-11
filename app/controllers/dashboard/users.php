<?php

use App\Models\User;

view('dashboard/users', [
    'title' => 'Users',
    'users' => User::all()->getAll()
]);
