<?php

class ProductController extends Database {

    use Utils;

    protected function insertProduct($sku, $name, $price, $type, $description) {

        $sql = 'INSERT INTO products (p_sku, p_name, p_price, p_type, p_description) VALUES (?, ?, ?, ?, ?)';
        $params = [$sku, $name, $price, $type, $description];
        $stmt = $this->connect()->prepare($sql);

        if($stmt->execute($params)){
            $this->redirect("success","../index.php?stmtfailed=false");
        }
        $this->redirect("failure","../index.php?stmtfailed=true");
    }

    public function getProducts() {
        $sql = 'SELECT * FROM products';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function deleteProduct($id) {
        $sql = 'DELETE FROM products WHERE p_ID = ?';
        $param = [$id];
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($param);
    }
}