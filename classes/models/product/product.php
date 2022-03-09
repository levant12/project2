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
        $this->valideteProduct();
        $this->insertProduct($this->SKU,$this->name,$this->price,$this->type,$this->description);
    }

    private function valideteProduct() {
        if ($this->emptyInput()) {
            $this->redirect("Fill every field","../add.php?emptyinput");
        }
        if ($this->invalidSKU()) {
            $this->redirect("Invalid SKU","../add.php?invalidSKU");
        }
    }

    private function emptyInput() {
        return empty($this->SKU) || empty($this->name) ||empty($this->price);
    }
    private function invalidSKU() {
        return preg_match('~[^a-z\d]~i', $this->SKU);
    }

}