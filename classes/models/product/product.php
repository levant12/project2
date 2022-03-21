<?php

abstract class Product extends Database {

    use Utils;

    protected int $ID;
    protected string $p_sku;
    protected string $p_name;
    protected float $p_price;
    protected string $p_type;

    protected abstract function insert();

    protected abstract function delete(int $id);

    protected  abstract function get();

//  function inserts into products table
    protected function insertIntoProducts() {
        $sql = "INSERT INTO products 
                (p_sku, p_name, p_price, p_type) VALUES 
                (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt;
    }

//  function returns last inserted ID from products table
    protected function getLastID(){
        $query = "SELECT MAX(ID) FROM products";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

//  getter and setters
    public function getPsku(): string {
        return $this->p_sku;
    }

    public function setPsku(string $p_sku): void {
        $this->p_sku = $p_sku;
    }

    public function getPName(): string {
        return $this->p_name;
    }

    public function setPName(string $p_name): void {
        $this->p_name = $p_name;
    }

    public function getPPrice(): float {
        return $this->p_price;
    }

    public function setPPrice(float $p_price): void {
        $this->p_price = $p_price;
    }

    public function getPType(): string {
        return $this->p_type;
    }

    public function setPType(string $p_type): void {
        $this->p_type = $p_type;
    }

    public function getID(): int
    {
        return $this->ID;
    }

    public function setID(int $ID): void
    {
        $this->ID = $ID;
    }

}