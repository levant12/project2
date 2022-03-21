<?php

require_once "./vendor/autoload.php";

//Getting data for each type of product
$dvd = new DVD();
$book = new Book();
$furniture = new Furniture();

$dvds = $dvd->get();
$books = $book->get();
$furnitures = $furniture->get();

//TODO: merge arrays using array_merge
$products = array_merge($dvds, $books, $furnitures);

//TODO: use usort to sort products array with ID and have mixed display
function prodSort($a,$b) {
    return $a->ID > $b->ID;
}
if (sizeof($products)>2)
    usort($products, "prodSort");

function echoProducts(int $inSlides, int $inRows, $products, string $slidesClass){
    // associative array which has appropriate description for each type
    $typeDescription = [
        ProductTypeEnum::FURNITURE => "dimension: ",
        ProductTypeEnum::DVD => "size: ",
        ProductTypeEnum::BOOK => "weight: "
    ];
    // for loop echos every product from products array
    for ($i = 0; $i< sizeof($products); $i++) { 
        echo ($i%$inSlides == 0) ? "<div class='{$slidesClass} fade'>" : "";
        echo ($i%$inRows == 0) ? "<div class='row'>" : "";
        echo "<div class='p'>";
        echo "<input type='checkbox' class='delete-checkbox' value='{$products[$i]->getID()}'>";
        echo "<br>";
        echo "<p>{$products[$i]->getPsku()}</p>";
        echo "<h3>{$products[$i]->getPName()}</h3>";
        $price = sprintf("%.2f",$products[$i]->getPPrice());
        echo "<p>{$price}$</p>";
        switch ($products[$i]->getPType()){
            case ProductTypeEnum::DVD:
                echo "<p>{$typeDescription[ProductTypeEnum::DVD]}{$products[$i]->getSize()}</p>";
                break;
            case ProductTypeEnum::BOOK:
                echo "<p>{$typeDescription[ProductTypeEnum::BOOK]}{$products[$i]->getWeight()}</p>";
                break;
            case ProductTypeEnum::FURNITURE:
                echo "<p>{$typeDescription[ProductTypeEnum::BOOK]}{$products[$i]->getDimension()}</p>";
                break;
        }
        echo "</div>";
        echo ($i%$inRows == ($inRows - 1)) ? "</div>" : "";
        echo ($i%$inSlides == ($inSlides - 1)) ? "</div>" : "";
    }
}
