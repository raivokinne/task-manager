<?php

use App\Models\User;
use Core\Validator;

$email = $_POST['email'];
$token = $_POST['_token'];

if (!csrf_verify($token)) {
    redirect('/forgot-password');
}

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Email is not valid';
}

if (!empty($errors)) {
    return view(
        'forgot-password/create', [
            'errors' => $errors
        ]
    );
}

$user = User::where('email', '=', $email)->get();

if (!$user) {
    return view(
        'forgot-password/create', [
            'errors' => ['email' => 'Email not found']
        ]
    );
}

if (!empty($errors)) {
    return view(
        'forgot-password/create', [
            'errors' => $errors
        ]
    );
}

redirect('/login');
