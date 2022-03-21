<?php

class Book extends Product {

    private float $weight;

    public function insert() :void {
        $data = [
            $this->p_sku,
            $this->p_name,
            $this->p_price,
            ProductTypeEnum::BOOK
        ];
        $this->insertIntoProducts()->execute($data);
        $sql = "INSERT INTO book (p_id, weight) VALUES (?, ?)";
        $id = $this->getLastID();
        $data = [
            $id,
            $this->weight
        ];
        $stmt = $this->connect()->prepare($sql);
        if($stmt->execute($data))
            $this->redirect("success","../index.php?stmtsfailed=false");
        $this->redirect("failure", "../index.php?stmtsfailed=true");
    }

    public function delete(int $id) :void {
        // TODO: Implement delete() method with cascade
        $sql = 'DELETE FROM products WHERE ID = ?';
        $param = [$id];
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($param);
        // NOTE: if cascade won't work
//        $sql2 = 'DELETE FROM book WHERE p_ID = ?';
//        $stmt2 = $this->connect()->prepare($sql2);
//        $stmt2->execute($param);
    }

    public function get() {
        $sql = "SELECT products.*, book.weight 
                FROM products
                JOIN book 
                WHERE products.ID = book.p_ID";
        $stmt = $this->connect()->prepare($sql);

        $products = [];
        $i = 0;

        while ($prod = $stmt->fetchObject(__CLASS__)){
            $products[$i] = $prod;
            $i++;
        }

        return $products;
    }

//  getter and setters
    public function getWeight(): float {
        return $this->weight;
    }

    public function setWeight(float $weight): void {
        $this->weight = $weight;
    }
}