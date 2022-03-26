<?php

class Database {

    public static function connect($config): PDO {
        try {
            return new PDO(
                $config['connection'].';dbname='.$config['name'].';charset='.$config['charset'].';port='.$config['port'],
                $config['username'],
                $config['password'],
                $config['options']
            );

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
