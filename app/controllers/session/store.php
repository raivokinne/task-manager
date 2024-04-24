<?php

use App\Models\User;
use Core\Authenticator;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$token = $_POST['_token'];

if (!csrf_verify($token)) {
    redirect('/login');
}

$errors = [];

if (empty($email) || empty($password)) {
    $errors['empty'] = 'Field cannot be empty';
}

if (!Validator::email($email)) {
    $errors['email'] = 'Email must be a valid email';
}

$user = User::where('email', '=', $email)->get();

if (!$user) {
    if (count($errors) > 0) {
        return view(
            'auth/login', [
                'title' => 'Login',
                'errors' => $errors
            ]
        );
    }
} else {
    (new Authenticator())->attempt($email, $password);

    redirect('/');
}
