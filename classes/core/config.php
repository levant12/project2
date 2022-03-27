<?php

class Config{
    protected static $registry = [
        'database' => [
            'name' => "i8vs6pdp27907erl",
            'username' => "ji1b90atk3dvr2xf",
            'password' => "lvdzjcu053ky7wb0",
            'connection' => "mysql:host=i54jns50s3z6gbjt.chr7pe7iynqr.eu-west-1.rds.amazonaws.com",
            'port' => "3306",
            'charset' => 'utf8mb4',
            'options' => [
                PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false
            ]
        ]
    ];

    public static function getRegistry($key): array {
        return self::$registry[$key];
    }

}

//return [
//    'database' => [
//        'name' => "i8vs6pdp27907erl",
//        'username' => "ji1b90atk3dvr2xf",
//        'password' => "lvdzjcu053ky7wb0",
//        'connection' => "mysql:host=i54jns50s3z6gbjt.chr7pe7iynqr.eu-west-1.rds.amazonaws.com",
//        'port' => "3306",
//        'charset' => 'utf8mb4',
//        'options' => [
//            PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
//            PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
//            PDO::ATTR_EMULATE_PREPARES   => false
//        ]
//    ]
//];
