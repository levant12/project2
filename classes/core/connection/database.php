<?php

class Database {

    protected static $conn = null;

    public static function connect($config): PDO {
        if (static::$conn == null) {
            try {
                static::$conn = new PDO(
                    $config['connection'] . ';dbname=' . $config['name'] . ';charset=' . $config['charset'] . ';port=' . $config['port'],
                    $config['username'],
                    $config['password'],
                    $config['options']
                );
                return static::$conn;

            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
        return static::$conn;
    }
}
