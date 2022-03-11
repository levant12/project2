<?php

class Product extends ProductController{

    private $SKU;
    private $name;
    private $price;
    private $type;
    private $description;

    public function __construct($SKU,$name,$price,$type,$description) {
        $this->SKU = $SKU;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
        $this->description = $description;
    }

    public function saveProduct() {
        $this->insertProduct($this->SKU,$this->name,$this->price,$this->type,$this->description);
    }

}