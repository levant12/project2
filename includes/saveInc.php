<?php

require_once "../vendor/autoload.php";

if (isset($_POST['save'])) {
    $type = $_POST["productType"];
    $product = productFactory::makeFor($type);
    $product->setPsku($_POST["SKU"]);
    $product->setPName($_POST["name"]);
    $product->setPPrice($_POST["price"]);
    $product->setPType($type);
    $product->insert();

    header("location: ../index.php?error=none");
}