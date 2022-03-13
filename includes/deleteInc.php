<?php

require_once "../vendor/autoload.php";

// get checkedboxes id-s from index.js
$checkedBoxes = $_POST;

$query = new ProductController();

// remove every checked product
foreach($checkedBoxes['checked'] as $checkedBox) {
    $query->deleteProduct($checkedBox);
}

header("location: ./index.php?error=none");