<?php

namespace Core;

use App\Models\User;

class Validator
{
    public static $errors = [];

    public static function validate(array $data, array $rules)
    {
        foreach ($rules as $key => $rule) {
            if (!isset($data[$key])) {
                self::$errors[$key] = 'Field ' . $key . ' is required';
            }

            $value = $data[$key];

            if (empty($value)) {
                self::$errors[$key] = 'Field ' . $key . ' is required';
            }

            if ($rule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                self::$errors[$key] = 'Field ' . $key . ' is not valid';
            }

            if (strpos($rule, 'min:') === 0) {
                $min = substr($rule, 4);
                if (strlen($value) < $min) {
                    self::$errors[$key] = 'Field ' . $key . ' is too short';
                }
            }

            if (strpos($rule, 'max:') === 0) {
                $max = substr($rule, 4);
                if (strlen($value) > $max) {
                    self::$errors[$key] = 'Field ' . $key . ' is too long';
                }
            }

            if (strpos($rule, 'confirmed:') === 0) {
                $confirmedField = substr($rule, 10);
                if (!isset($data[$confirmedField]) || $value !== $data[$confirmedField]) {
                    self::$errors[$key] = 'Field ' . $key . ' is not confirmed';
                }
            }

            if (strpos($rule, 'unique:') === 0) {
                $key = substr($rule, 7);
                
                $result = User::where($key, $value);

                if (count($result) > 0) {
                    self::$errors[$key] = 'Field ' . $key . ' already exists';
                }
            }

            if (strpos($rule, 'number') === 0) {
                if (!is_numeric($value)) {
                    self::$errors[$key] = 'Field ' . $key . ' is not a number';
                }
            }

            if (strpos($rule, 'image') === 0) {
                if (!filter_var($value, FILTER_VALIDATE_URL)) {
                    self::$errors[$key] = 'Field ' . $key . ' is not an image';
                }
            }

            return self::$errors;
        }
    }
}
