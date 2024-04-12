<?php

namespace Core;

use Database\Database;

class Model extends Database
{
    protected static string $table = '';
    protected static $statement = null;

    public static function all()
    {
        $sql = "SELECT * FROM " . static::$table;
        self::$statement = self::$connection->prepare($sql);
        self::$statement->execute();
        return self::$statement->fetchAll();
    }

    public static function find(int $id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = :id";
        self::$statement = self::$connection->prepare($sql);
        self::$statement->execute(['id' => $id]);
        return self::$statement->fetch();
    }

    public static function create(array $data)
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
        return new static;
    }

    public static function update(int $id, array $data)
    {
        $sql = "UPDATE " . static::$table . " SET ";
        foreach ($data as $key => $value) {
            $sql .= $key . ' = :' . $key . ',';
        }
        $sql = substr($sql, 0, -1) . ' WHERE id = :id';
        $query = self::$connection->prepare($sql);
        $data['id'] = $id;
        $query->execute($data);
        return new static;
    }

    public static function delete(int $id)
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = :id";
        self::$statement = self::$connection->prepare($sql);
        self::$statement->execute(['id' => $id]);
        return new static;
    }

    public static function where(string $key, string $value)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE " . $key . " = :value LIMIT 1";
        self::$statement = self::$connection->prepare($sql);
        self::$statement->execute(['value' => $value]);
        return new static;
    }

    public static function get()
    {
        return self::$statement->fetch();
    }

    public static function getAll()
    {
        return self::$statement->fetchAll();
    }

    public static function join(string $table, string $key, string $value)
    {
        $sql = "SELECT * FROM " . static::$table . " INNER JOIN " . $table . " ON " . static::$table . "." . $key . " = " . $table . "." . $value;
        self::$statement = self::$connection->prepare($sql);
        self::$statement->execute();
        return self::$statement->fetchAll();
    }

    public static function count()
    {
        return self::$statement->rowCount();
    }

    public static function whereLike(string $key, string $value)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE " . $key . " LIKE :value";
        self::$statement = self::$connection->prepare($sql);
        self::$statement->execute(['value' => '%' . $value . '%']);
        return new static;
    }
}
