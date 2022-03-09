<?php

require_once "./vendor/autoload.php";

$query = new ProductController();

// storing product from database into array
$products = $query->getProducts();

function echoProducts(int $inSlides, int $inRows, $products, string $slidesClass){
    // associative array which has appropriate description for each type
    $typeDescription = ["furniture" => "dimension: ", "dvd" => "size: ", "book" => "weight: "];
    // for loop echos every product from products array
    for ($i = 0; $i< sizeof($products); $i++) { 
        echo ($i%$inSlides == 0) ? "<div class='{$slidesClass} fade'>" : "";
        echo ($i%$inRows == 0) ? "<div class='row'>" : "";
        echo "<div class='p'>";
        echo "<input type='checkbox' value='{$products[$i]->p_ID}'>";
        echo "<br>";
        echo "<p>{$products[$i]->p_sku}</p>";
        echo "<h3>{$products[$i]->p_name}</h3>";
        $price = sprintf("%.2f",$products[$i]->p_price);
        echo "<p>{$price}$</p>";
        echo "<p>{$typeDescription[$products[$i]->p_type]}{$products[$i]->p_description}</p>";
        echo "</div>";
        echo ($i%$inRows == ($inRows - 1)) ? "</div>" : "";
        echo ($i%$inSlides == ($inSlides - 1)) ? "</div>" : "";
    }
}
