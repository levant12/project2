<?php

require_once "../vendor/autoload.php";

function setAttributes($product, $sku, $name, $price, $type){
    $product->setPsku($sku);
    $product->setPName($name);
    $product->setPPrice($price);
    $product->setPType($type);
}


if (isset($_POST['save'])) {
    $sku = $_POST["SKU"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["productType"];
    switch ($type){
        case 'dvd':{
            $product = new DVD();
            setAttributes($product,$sku,$name,$price,$type);
            $product->setSize($_POST ['dvdSize']);
            $product->insert();
            break;
        }
        case 'book':{
            $product = new Book();
            setAttributes($product,$sku,$name,$price,$type);
            $product->setWeight($_POST ['bookWeight']);
            $product->insert();
            break;
        }
        case 'furniture': {
            $product = new Furniture();
            setAttributes($product,$sku,$name,$price,$type);
            $product->setHeight($_POST ['furnH']);
            $product->setWidth($_POST['furnW']);
            $product->setLength($_POST['furnL']);
            $product->insert();
            break;
        }
    }

    header("location: ../index.php?error=none");
}