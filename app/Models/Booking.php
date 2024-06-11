<?php

namespace App\Models;

use Core\Model;

class Booking extends Model
{
    protected static string $table = 'bookings';

    public static function deleteByUser(int $id)
    {
        $sql = "DELETE FROM " . static::$table . " WHERE user_id = :id";
        self::$statement = self::$connection->prepare($sql);
        self::$statement->execute(['id' => $id]);
    }
}
