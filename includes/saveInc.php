<?php

require_once "../vendor/autoload.php";

if (isset($_POST['save'])) {
    $sku = $_POST["SKU"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["productType"];
    $description;
    switch ($type){
        case 'dvd':{
            $description = $_POST ['dvdSize'];
            break;
        }
        case 'book':{
            $description = $_POST['bookWeight'];
            break;
        }
        case 'furniture': {
            $description = $_POST['furnH'] . 'x' . $_POST['furnW'] . 'x' .  $_POST['furnL'];
            break;
        }
    }
     
    $product = new Product($sku,$name,$price,$type,$description);
    $product->saveProduct();
    header("location: ../index.php?error=none");
}