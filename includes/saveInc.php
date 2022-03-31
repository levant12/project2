<?php

require_once "../vendor/autoload.php";

$prodTypes = [
    'dvd' => [
        'new' => new DVD(),
        'descriptionID' => 'dvdSize'
    ],
    'book' => [
        'new' => new Book(),
        'descriptionID' => 'bookWeight'
    ],
    'furniture' => [
        'new' => new Furniture(),
        'descriptionID' => 'furnH, furnW, furnL'
    ],
];

if (isset($_POST['save'])) {
    $type = $_POST["productType"];
    $prodType =$prodTypes[$type];
    $product = $prodType['new'];
    $product->setPsku($_POST["SKU"]);
    $product->setPName($_POST["name"]);
    $product->setPPrice($_POST["price"]);
    $product->setPType($type);
    $decrIDs = explode(", ",$prodType['descriptionID']);
    $description = [];
    for ($i = 0; $i < sizeof($decrIDs); $i++){
        $description[$i] = $_POST[$decrIDs[$i]];
    }
    $product->setDescription(...$description);
    $product->insert();

    header("location: ../index.php?error=none");
}