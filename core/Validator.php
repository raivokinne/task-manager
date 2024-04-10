<?php

namespace Core;

use App\Models\User;

class Validator
{
    public static function validate(array $data, array $rules)
    {
        $errors = [];

        foreach ($rules as $field => $ruleString) {
            $rulesArray = explode('|', $ruleString);
            foreach ($rulesArray as $rule) {
                if ($rule === 'required' && empty($data[$field])) {
                    $errors[$field][] = ucfirst($field) . ' is required.';
                } elseif ($rule === 'email' && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                    $errors[$field][] = 'Invalid email format for ' . $field . '.';
                } elseif (strpos($rule, 'min:') === 0) {
                    $minLength = (int) substr($rule, 4);
                    if (strlen($data[$field]) < $minLength) {
                        $errors[$field][] = ucfirst($field) . ' must be at least ' . $minLength . ' characters long.';
                    }
                } elseif ($rule === 'confirmed') {
                    $confirmationField = $field . '_confirmation';
                    if (!isset($data[$confirmationField]) || $data[$field] !== $data[$confirmationField]) {
                        $errors[$field][] = ucfirst($field) . ' confirmation does not match.';
                    }
                }
            }
        }

        return $errors;
    }
}
