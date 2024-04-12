<?php

namespace Core;

use Database\Database;

class Validator
{
    public static function string($value)
    {
        return is_string($value);
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function checkLength($value, $min = 0, $max = INF)
    {
        $value = trim($value);
        return mb_strlen($value) >= $min && mb_strlen($value) <= $max;
    }

    public static function number($value)
    {
        $value = trim($value);

        return is_numeric($value);
    }

    public static function required($value = [])
    {
        return !empty($value);
    }
}
