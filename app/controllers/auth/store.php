<?php

use Core\Validator;

$data = $_POST;

$formFields = Validator::validate($data, [
    'name' => 'required|min:3',
    'email' => 'required|email',
    'password' => 'required|min:8|confirmed:' . $data['password_confirmation'],
]);

dd($formFields);