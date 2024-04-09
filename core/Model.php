<?php

namespace Core;

use Database\Database;

class Model extends Database
{
    protected static string $table = '';

    public static function all(): array
    {
        $sql = "SELECT * FROM " . static::$table;
        $query = self::$connection->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function find(int $id): array
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = :id";
        $query = self::$connection->prepare($sql);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public static function create(array $data): int
    {
        $sql = "INSERT INTO " . static::$table . " (";
        foreach ($data as $key => $value) {
            $sql .= $key . ',';
        }
        $sql = substr($sql, 0, -1) . ') VALUES (';
        foreach ($data as $key => $value) {
            $sql .= ':' . $key . ',';
        }
        $sql = substr($sql, 0, -1) . ')';
        $query = self::$connection->prepare($sql);
        $query->execute($data);
        return self::$connection->lastInsertId();
    }

    public static function update(int $id, array $data): int
    {
        $sql = "UPDATE " . static::$table . " SET ";
        foreach ($data as $key => $value) {
            $sql .= $key . ' = :' . $key . ',';
        }
        $sql = substr($sql, 0, -1) . ' WHERE id = :id';
        $query = self::$connection->prepare($sql);
        $data['id'] = $id;
        $query->execute($data);
        return $query->rowCount();
    }

    public static function delete(int $id): int
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = :id";
        $query = self::$connection->prepare($sql);
        $query->execute(['id' => $id]);
        return $query->rowCount();
    }

    public static function where(string $key, string $value): array
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE " . $key . " = :value";
        $query = self::$connection->prepare($sql);
        $query->execute(['value' => $value]);
        return $query->fetchAll();
    }
}
