<?php

use Core\Validator;
use App\Models\User;
use Core\Authenticator;

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];

$errors = [];

if (empty($username) || empty($email) || empty($password) || empty($password_confirmation)) {
    $errors['empty'] = 'Field cannot be empty';
}

if (!Validator::string($username)) {
    $errors['username'] = 'Username must be a string';
}

if (!Validator::email($email)) {
    $errors['email'] = 'Email must be a valid email';
}

if (!Validator::checkLength($username, min: 3)) {
    $errors['username'] = 'Username must be at least 3 characters';
}

if (!Validator::checkLength($password, min: 8)) {
    $errors['password'] = 'Password must be at least 8 characters';
}

if (!$password === $password_confirmation) {
    $errors['password_confirmation'] = 'Passwords do not match';
}

$user = User::where('email', $email)->get();

if ($user) {
    $errors['email'] = 'Email already exists';
    if (!empty($errors)) {
        view('auth/register', [
            'title' => 'Register',
            'errors' => $errors
        ]);
        return;
    }
} else {
    $user = User::create([
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'role' => 'user',
    ])->get();

    (new Authenticator())->login($user);

    redirect('/');
}