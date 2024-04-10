<?php

use Core\Validator;
use Core\Authenticator;
use App\Models\User;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (empty($email) || empty($password)) {
    $errors['empty'] = 'Field cannot be empty';
}

if (!Validator::email($email)) {
    $errors['email'] = 'Email must be a valid email';
    $user = User::where('email', $email)->get();

    if (!$user) {
        $errors['email'] = 'Email does not exist';
    }
}

if (count($errors) > 0) {
    view('auth/login', [
        'title' => 'Login',
        'errors' => $errors
    ]);
    return;
}

(new Authenticator())->attempt($email, $password);

redirect('/');
