<?php

use Core\Validator;

$data = $_POST;

$formErrors = Validator::validate($data, [
    'name' => 'required|min:3',
    'email' => 'required|email',
    'password' => 'required|min:8|confirmed',
]);

if (!empty($formErrors)) {
    view('auth/register', [
        'title' => 'Register',
        'errors' => $formErrors
    ]);
}
