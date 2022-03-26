<?php

class Furniture extends Product {
    private float $height;
    private float $width;
    private float $length;

    public function insert() :void {
        $data = [
            $this->p_sku,
            $this->p_name,
            $this->p_price,
            ProductTypeEnum::FURNITURE
        ];
            $this->insertIntoProducts()->execute($data);
            $sql = "INSERT INTO furniture (p_id, height, width, length) VALUES (?, ?, ?, ?)";
            $id = $this->getLastID();
            $data = [
                $id,
                $this->height,
                $this->width,
                $this->length
            ];
            $stmt = $this->getConnection()->prepare($sql);
            if($stmt->execute($data))
            $this->redirect("success","../index.php?stmtsfailed=false");
            $this->redirect("failure", "../index.php?stmtsfailed=true");

    }

    public function get() {
        $sql = "SELECT products.*, furniture.height, furniture.width, furniture.length
                FROM products
                JOIN furniture 
                WHERE products.ID = furniture.p_ID";
        $stmt = $this->getConnection()->prepare($sql);

        $products = [];
        $i = 0;

        $stmt->execute();
        while ($prod = $stmt->fetchObject(__CLASS__)){
            $products[$i] = $prod;
            $i++;
        }

        return $products;
    }

//  getter and setters
    public function getHeight(): float {
        return $this->height;
    }

    public function setHeight(float $height): void {
        $this->height = $height;
    }

    public function getWidth(): float {
        return $this->width;
    }

    public function setWidth(float $width): void {
        $this->width = $width;
    }

    public function getLength(): float {
        return $this->length;
    }

    public function setLength(float $length): void {
        $this->length = $length;
    }

//  returns HxWxL format furniture dimensions
    public function getDimension() :string{
        return $this->height.'x'.$this->width.'x'.$this->length;
    }

}