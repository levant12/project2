<?php

class Database {

    
    private $username = "ji1b90atk3dvr2xf";
    private $password = "lvdzjcu053ky7wb0";
    private $host = "i54jns50s3z6gbjt.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
    private $database = "i8vs6pdp27907erl";
    private $port = "3306";
    private $charset = 'utf8mb4';

    protected function connect() {
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $dbh = new PDO(
                "mysql:host={$this->host};dbname={$this->database};charset={$this->charset};port={$this->port}", 
                $this->username,
                $this->password
            );
            
            return $dbh;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
