<?php

class DVD extends Product {

    private float $size;

    public function insert() :void {
        $data = [
            $this->p_sku,
            $this->p_name,
            $this->p_price,
            ProductTypeEnum::DVD
        ];
        $this->insertIntoProducts()->execute($data);
        $id = $this->getLastID();
        print_r($id);
        $sql = "INSERT INTO dvd (p_id, size) VALUES (?, ?)";
        $data2 = [
            $id,
            $this->size
        ];
        $stmt = $this->connect()->prepare($sql);
        if($stmt->execute($data2))
            $this->redirect("success","../index.php?stmtsfailed=false");
        $this->redirect("failure", "../index.php?stmtsfailed=true");
    }

    public function get() {
        $sql = "SELECT products.*, dvd.size 
                FROM products
                JOIN dvd 
                WHERE products.ID = dvd.p_ID";
        $stmt = $this->connect()->prepare($sql);

        $products = [];
        $i = 0;
        $stmt->execute();
        while ($prod = $stmt->fetchObject(__CLASS__)) {
            $products[$i] = $prod;
            $i++;
        }

        return $products;
    }

//  getter and setters
    public function getSize(): float {
        return $this->size;
    }

    public function setSize(float $size): void {
        $this->size = $size;
    }

}